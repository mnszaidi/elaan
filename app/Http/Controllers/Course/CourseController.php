<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CoursesExport;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Question;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Tag;
use Auth;
use Image;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
    function __construct()
    {
        $this->middleware('permission:Admin-list|Admin-create|Admin-edit|Admin-delete', ['only' => ['index','show']]);
        $this->middleware('permission:Admin-create',            ['only' =>   ['create','store']]);
        $this->middleware('permission:Admin-edit',              ['only' =>   ['edit','update']]);
        $this->middleware('permission:Admin-upload',            ['only' =>   ['upload_page','upload_process','csvToArray']]);
        $this->middleware('permission:Admin-download',          ['only' =>   ['download_sample_csv']]);
        $this->middleware('permission:Admin-export',            ['only' =>   ['export_courses']]);
        $this->middleware('permission:Admin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Admin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Admin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Admin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }
    */

    /**
     * Display Course listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('category','tag','currency')->get();

        return view('courses.index_courses',compact('courses'));
    }
	
	/**
     * gET Course.
     *
     * @param  \App\Course  Course_code
     * @return \Illuminate\Http\Response
     */
    public function check_courses (Request $request)
    {
       try {
        $getFields = Course::where('course_code',$request->course_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Course.
     *
     * @param  \App\Course  Course_code
     * @return \Illuminate\Http\Response
     */
    public function get_courses (Request $request)
    {
       try {
        $getFields = Course::where('course_name',$request->course_name)->where('course_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Course Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('category_status', '1')->get();
        $tags       = Tag::where('tag_status', '1')->get();
        $currencies = Currency::where('currency_status', '1')->get();
        
        return view('courses.create_courses',compact('categories','tags','currencies'));
    }

    
    /**
     * Store a newly created Course in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'course_code' 	        => 'required|string|max:255|unique:courses',
            'course_name' 	        => 'required|string|max:255',
            'course_title'          => 'required|string|max:255',
            'course_summary'        => 'required|string|max:255',
            'course_description'    => 'required|string|max:16500',
            'course_price'          => 'required|string|max:255',
            'course_image'          => 'required|file|image|mimes:jpeg,bmp,png|max:8000',
            'course_shown'          => 'required|string|max:1',
            'category_id'           => 'required|string|max:1',
            'tag_id'                => 'required|string|max:1',
            'currency_id'           => 'required|string|max:1',
            'course_status'         => 'required',
        ]);

        if($image = $request->file('course_image'))
        {
            $extension  = $image->getClientOriginalExtension();
            
            $myvalue = $request->course_name;
            $name = str_replace(' ', '_', $myvalue);

            $image_name = $name.".".$extension;

            //Fullsize upload
            $image->move(public_path().'/uploads/images/',$image_name);
            //Resize Image
            $image_resize = Image::make(public_path().'/uploads/images/'.$image_name);
            $image_resize->fit(600, 485);
            $image_resize->save(public_path('uploads/courses/' .$image_name));
        }
        
        if($validate)
        {
            $isInserted = Course::create([
                'course_code' 	     => $request->course_code,
                'course_name' 	     => $request->course_name,
                'course_title'       => $request->course_title,
                'course_summary'     => $request->course_summary,
                'course_description' => $request->course_description,
                'course_price'       => $request->course_price,
                'currency_id'        => $request->currency_id,
                'category_id'        => $request->category_id,
                'tag_id'             => $request->tag_id,
                'course_shown'       => $request->course_shown,
                'course_image'       => $image_name,
                'course_status'      => $request->course_status,
                'created_by'         => Auth::user()->fname,
            ]);

            $id = $isInserted['id'];

            if($isInserted){
                return redirect()->route('courses.show', $id)->with('gmsg','Course created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Course Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $courses = Course::latest()->paginate(10);
        
        return view('courses.upload_courses',compact('courses'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Course CSV Upload Function.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function upload_process(Request $request)
    {
        try {

           if ($request->file('csv')) 
            {
                $validate = $this->validate($request,[
                    'csv'=>'required|mimes:csv,txt',
                ]);
                if($validate)
            {
                    $file = $request->file('csv');
                    $extension = $file->getClientOriginalExtension();
                    $file_name = 'csv_'.rand().'.'.$extension;
                    $path = $file->move(public_path().'/csv',$file_name);


                    $customerArr = $this->csvToArray($path);

                for ($i = 0; $i < count($customerArr); $i ++)
                    {
                    Course::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

                return redirect()->route('courses.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('courses.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */

    public function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;
                $header = null;
                $data = array();
                if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    {
                    $header = $row;
                    }
                else
                    {
                    $data[] = array_combine($header, $row);
                    }
            }
            fclose($handle);
        }

        return $data;
    }

    
     /**
     * Display the specified Course.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $course = $course->load('category','tag', 'currency');

        $questions = Question::with('answers')->where('course_id', $course->id)->get();

        // foreach ($questions as $question){

        //     foreach($question->answers as $answer){
        //         dd($answer->answer);

        //     }

        // }

        return view('courses.show_courses',compact('course','questions'));
    }


    /**
     * Show Course Edit Page.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::where('category_status', '1')->get();
        $tags       = Tag::where('tag_status', '1')->get();
        $currencies = Currency::where('currency_status', '1')->get();

        return view('courses.update_courses',compact('course','categories','tags','currencies'));
    }

    /**
     * Update the specified Course in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        
        $validate = $this->validate($request,[
            'course_code'           => 'required|string|max:255',
            'course_name'           => 'required|string|max:255',
            'course_title'          => 'required|string|max:255',
            'course_summary'        => 'required|string|max:255',
            'course_description'    => 'required|string|max:16500',
            'course_price'          => 'required|string|max:255',
            'course_image'          => 'sometimes|file|image|mimes:jpeg,bmp,png|max:8000',
            'course_shown'          => 'required|string|max:1',
            'category_id'           => 'required|string|max:1',
            'tag_id'                => 'required|string|max:1',
            'currency_id'           => 'required|string|max:1',
            'course_status'         => 'required',
        ]);

        if($image = $request->file('course_image'))
        {
            $extension  = $image->getClientOriginalExtension();
            
            $myvalue = $request->course_name;
            $name = str_replace(' ', '_', $myvalue);

            $image_name = $name.".".$extension;

            //Fullsize upload
            $image->move(public_path().'/uploads/images/',$image_name);
            //Resize Image
            $image_resize = Image::make(public_path().'/uploads/images/'.$image_name);
            $image_resize->fit(600, 485);
            $image_resize->save(public_path('uploads/courses/' .$image_name));
        }

        if($validate)
        {

            $course->course_code            = $request->course_code;
            $course->course_name            = $request->course_name;
            $course->course_title           = $request->course_title;
            $course->course_summary         = $request->course_summary;
            $course->course_description     = $request->course_description;
            $course->course_price           = $request->course_price;
            $course->course_image           = $request->course_image == null? $course->course_image : $image_name;
            $course->course_shown           = $request->course_shown;
            $course->category_id            = $request->category_id;
            $course->tag_id                 = $request->tag_id;
            $course->currency_id            = $request->currency_id;
            $course->course_status          = $request->course_status;
            $course->updated_by             = Auth::user()->fname;

            if($course->save()){

                return redirect()->route('courses.index')->with('gmsg','Data Successfully Updated ...');

            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Download Sample countries CSV.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function download_sample_csv()
    {
        
        $filename="courses_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Course Table.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function export_courses()
    {
        return Excel::download(new CoursesExport, 'Courses.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $courses = Course::onlyTrashed()->get();
        $getFields = Course::onlyTrashed()->count();

        if($getFields > 0){

            return view('courses.deleted_courses',compact('courses'));
        }else{
            return redirect()->route('courses.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single course.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Course::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored){

            return redirect()->route('courses.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Course::onlyTrashed()->restore();
        if($restored){
            return redirect()->route('courses.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Course.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Course::where('id',$id)->forceDelete();
        if($isDeleted){
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk courses.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Course::where('id',$id)->forceDelete();
        }

        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Course.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Course::where('id',$id)->delete();
        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk courses.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {
        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Course::where('id',$id)->delete();
        }

        if($isDeleted){
        
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}

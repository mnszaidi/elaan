<?php

namespace App\Http\Controllers\Assignment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AssignmentsExport;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Course;
use Auth;

class AssignmentController extends Controller
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
        $this->middleware('permission:Admin-export',            ['only' =>   ['export_assignments']]);
        $this->middleware('permission:Admin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Admin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Admin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Admin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }
    */

    /**
     * Display Assignment listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Assignment::get();
        return view('assignments.index_assignments',compact('assignments'));
    }
	
	/**
     * gET Assignment.
     *
     * @param  \App\Assignment  Assignment_code
     * @return \Illuminate\Http\Response
     */
    public function check_assignments (Request $request)
    {
       try {
        $getFields = Assignment::where('assignment_code',$request->assignment_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Assignment.
     *
     * @param  \App\Assignment  Assignment_code
     * @return \Illuminate\Http\Response
     */
    public function get_assignments (Request $request)
    {
       try {
        $getFields = Assignment::where('assignment_name',$request->assignment_name)->where('assignment_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Assignment Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::where('course_status','1')->get();

        return view('assignments.create_assignments',compact('courses'));
    }

    
    /**
     * Store a newly created Assignment in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'assignment_code' 	     => 'required|string|max:255|unique:assignments',
            'assignment_name' 	     => 'required|string|max:255',
            'assignment_title'       => 'required|string|max:255',
            'assignment_description' => 'required|string|max:255',
            'assignment_summary'     => 'required|string|max:255',
            'course_id'              => 'required',
            'assignment_status'      => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Assignment::create([
                'assignment_code' 	     => $request->assignment_code,
                'assignment_name' 	     => $request->assignment_name,
                'assignment_title'       => $request->assignment_title,
                'assignment_description' => $request->assignment_description,
                'assignment_summary'     => $request->assignment_summary,
                'assignment_status'      => $request->assignment_status,
                'course_id'              => $request->course_id,
                'created_by'             => Auth::user()->fname,
            ]);

            if($isInserted){
                return redirect()->route('assignments.index')->with('gmsg','Assignment created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Assignment Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $assignments = Assignment::latest()->paginate(10);
        
        return view('assignments.upload_assignments',compact('assignments'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Assignment CSV Upload Function.
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
                    Assignment::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

                return redirect()->route('assignments.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('assignments.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Assignment  $assignment
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
     * Display the specified Assignment.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
    
        return view('assignments.show_assignments',compact('assignment'));
    }


    /**
     * Show Assignment Edit Page.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        $courses = Course::where('course_status','1')->get();

        return view('assignments.update_assignments',compact('assignment','courses'));
    }

    /**
     * Update the specified Assignment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        
        $validate = $this->validate($request,[
            'assignment_code'        => 'required|string|max:255',
            'assignment_name'        => 'required|string|max:255',
            'assignment_title'       => 'required|string|max:255',
            'assignment_description' => 'required|string|max:255',
            'assignment_summary'     => 'required|string|max:255',
            'course_id'              => 'required',
            'assignment_status'      => 'required',
        ]);

        if($validate)
        {

            $assignment->assignment_code        = $request->assignment_code;
            $assignment->assignment_name        = $request->assignment_name;
            $assignment->assignment_title       = $request->assignment_title;
            $assignment->assignment_description = $request->assignment_description;
            $assignment->assignment_summary     = $request->assignment_summary;
            $assignment->course_id              = $request->course_id;
            $assignment->assignment_status      = $request->assignment_status;
            $assignment->updated_by             = Auth::user()->fname;

            if($assignment->save()){

                return redirect()->route('assignments.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="assignments_sample.csv";
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
     *  Export items in Assignment Table.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function export_assignments()
    {
        return Excel::download(new AssignmentsExport, 'Assignments.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $assignments = Assignment::onlyTrashed()->get();
        $getFields = Assignment::onlyTrashed()->count();

        if($getFields > 0){

            return view('assignments.deleted_assignments',compact('assignments'));
        }else{
            return redirect()->route('assignments.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single assignment.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Assignment::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored){

            return redirect()->route('assignments.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Assignment::onlyTrashed()->restore();
        if($restored){
            return redirect()->route('assignments.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Assignment.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Assignment::where('id',$id)->forceDelete();
        if($isDeleted){
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk assignments.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Assignment::where('id',$id)->forceDelete();
        }

        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Assignment.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Assignment::where('id',$id)->delete();
        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk assignments.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {
        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Assignment::where('id',$id)->delete();
        }

        if($isDeleted){
        
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}

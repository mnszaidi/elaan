<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\QuestionsExport;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Question;
use App\Models\Answer;
use Auth;

class QuestionController extends Controller
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
        $this->middleware('permission:Admin-export',            ['only' =>   ['export_questions']]);
        $this->middleware('permission:Admin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Admin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Admin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Admin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }
    */

    /**
     * Display Question listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('course')->get();

        return view('questions.index_questions',compact('questions'));
    }
	
	/**
     * gET Question.
     *
     * @param  \App\Question  Question_code
     * @return \Illuminate\Http\Response
     */
    public function check_questions (Request $request)
    {
       try {
        $getFields = Question::where('question_code',$request->question_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Question.
     *
     * @param  \App\Question  Question_code
     * @return \Illuminate\Http\Response
     */
    public function get_questions (Request $request)
    {
       try {
        $getFields = Question::where('question_name',$request->question_name)->where('question_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Question Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::where('course_status','1')->get();

        return view('questions.create_questions',compact('courses'));
    }

    
    /**
     * Store a newly created Question in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request,[
            'course_id' 	    => 'required|string|max:255',
            'question'          => 'required|string|max:255',
            'answer_no.*' 	    => 'required',
            'answer.*'          => 'required',
            'answer_status.*'  => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Question::create([
                'question' 	        => $request->question,
                'course_id' 	    => $request->course_id,
                'question_status'   => 1,
                'created_by'        => Auth::user()->fname,
            ]);

            $id = $isInserted['id'];

                $data = $request->all();

                for($i=0; $i<count($data['answer_no']); $i++){
                    $answer =new Answer();
                    $answer->question_id        = $id;
                    $answer->answer_no          = $request['answer_no'][$i];
                    $answer->answer             = $request['answer'][$i];
                    $answer->answer_status      = $request['answer_status'][$i];
                    $answer->save();
                }

            $course_id = $request->course_id;

            if($isInserted){
                return redirect()->route('courses.show', $course_id)->with('gmsg','Question created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Question Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $questions = Question::latest()->paginate(10);
        
        return view('questions.upload_questions',compact('questions'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Question CSV Upload Function.
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
                    Question::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

                return redirect()->route('questions.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('questions.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Question  $question
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
     * Display the specified Question.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question = $question->load('course');

        return view('questions.show_questions',compact('question'));
    }


    /**
     * Show Question Edit Page.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {

        $courses = Course::where('course_status','1')->get();
        
        $answers = Answer::where('question_id',$question->id)->get();
        
        return view('questions.update_questions',compact('question','courses','answers'));
    }

    /**
     * Update the specified Question in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        
            $validate = $this->validate($request,[
                'course_id'         => 'required|string|max:255',
                'question'          => 'required|string|max:255',
                'answer_no.*'       => 'required',
                'answer.*'          => 'required',
                'answer_status.*'  => 'required',
            ]);

        if($validate)
        {

            $question->question         = $request->question;
            $question->course_id        = $request->course_id;
            $question->question_status  = $request->question_status;
            $question->updated_by       = Auth::user()->fname;

            $answers = Answer::where('question_id',$question->id)->forceDelete();

            $data = $request->all();

            for($i=0; $i<count($data['answer_no']); $i++){
                $answer =new Answer();
                $answer->question_id        = $question->id;
                $answer->answer_no          = $request['answer_no'][$i];
                $answer->answer             = $request['answer'][$i];
                $answer->answer_status      = $request['answer_status'][$i];
                $answer->save();
            }

            if($question->save()){

                return redirect()->route('questions.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="questions_sample.csv";
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
     *  Export items in Question Table.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function export_questions()
    {
        return Excel::download(new QuestionsExport, 'Questions.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $questions = Question::onlyTrashed()->get();
        $getFields = Question::onlyTrashed()->count();

        if($getFields > 0){

            return view('questions.deleted_questions',compact('questions'));
        }else{
            return redirect()->route('questions.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single question.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Question::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored){

            return redirect()->route('questions.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Question::onlyTrashed()->restore();
        if($restored){
            return redirect()->route('questions.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Question.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Question::where('id',$id)->forceDelete();
        if($isDeleted){
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk questions.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Question::where('id',$id)->forceDelete();
        }

        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Question.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Question::where('id',$id)->delete();
        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk questions.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {
        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Question::where('id',$id)->delete();
        }

        if($isDeleted){
        
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}

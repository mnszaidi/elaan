<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExamsExport;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Course;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Assignment;
use App\Models\AssignmentUser;
use Auth;

class ExamController extends Controller
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
        $this->middleware('permission:Admin-export',            ['only' =>   ['export_exams']]);
        $this->middleware('permission:Admin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Admin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Admin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Admin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }
    */

    /**
     * Display Exam listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::get();
        return view('exams.index_exams',compact('exams'));
    }
	
	/**
     * gET Exam.
     *
     * @param  \App\Exam  Exam_code
     * @return \Illuminate\Http\Response
     */
    public function check_exams (Request $request)
    {
       try {
        $getFields = Exam::where('exam_code',$request->exam_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Exam.
     *
     * @param  \App\Exam  Exam_code
     * @return \Illuminate\Http\Response
     */
    public function get_exams (Request $request)
    {
       try {
        $getFields = Exam::where('exam_name',$request->exam_name)->where('exam_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Exam Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('exams.create_exams');
    }

    
    /**
     * Store a newly created Exam in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'exam_code' 	=> 'required|string|max:255|unique:exams',
            'exam_name' 	=> 'required|string|max:255',
            'exam_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Exam::create([
                'exam_code' 	=> $request->exam_code,
                'exam_name' 	=> $request->exam_name,
                'exam_status' => $request->exam_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted){
                return redirect()->route('exams.index')->with('gmsg','Exam created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Exam Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function take_exam($id)
    {
        $user = Auth::user();
        $course = Course::find($id)->load('category','tag', 'currency','users', 'assignment');
        $exists = $course->users->contains($user->id);
        $assignments = Assignment::where('course_id',$course->id)->get();
        
        if($exists){
            $questions = Question::where('course_id',$course->id)->get();
            return view('exams.take_exams',compact('questions','course','assignments'));
        }else{
                return back()->with('bmsg','You are not Subscribed to this Course');
            }
    }

    /**
     * Exam CSV Upload Function.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function exams_submt(Request $request)
    {
        $validate = $this->validate($request,[
            'course_title.*'        => 'required',
            'question.*'            => 'required',
            'answer.*'              => 'required',
            'assignment_title.*'    => 'required',
            'assignment_file.*'     => 'sometimes|file|max:80000',
        ]);

        // if($image = $request->file('assignment_file'))
        // {
        //     $extension  = $image->getClientOriginalExtension();
            
        //     $myvalue = $request->assignment_title;
        //     $name = str_replace(' ', '_', $myvalue);

        //     $image_name = $name.".".$extension;

        //     //Fullsize upload
        //     $image->move(public_path().'/uploads/',$image_name);
        // }

        if($validate)
        {
            $data = $request->all();
            $last_batch = Exam::max('batch_id');
            $batch_id = $last_batch == null ? 1 : $last_batch + 1;

            for($i=0; $i<count($data['question']); $i++){

                $get_answer = Answer::where('answer', $request['answer'][$i])->first();

                $exam =new Exam();
                $exam->batch_id       = $batch_id;
                $exam->user_id        = Auth::user()->id;
                $exam->course_title   = $request['course_title'][$i];
                $exam->question       = $request['question'][$i];
                $exam->answer         = $request['answer'][$i];
                $exam->answer_status  = $get_answer->answer_status;
                $exam->save();
            }

            for($i=0; $i<count($data['assignment_title']); $i++){

                $assignmentUser =new AssignmentUser();
                $assignmentUser->batch_id           = $batch_id;
                $assignmentUser->user_id            = Auth::user()->id;
                $assignmentUser->course_title       = $request['course_title'][$i];
                $assignmentUser->assignment_title   = $request['assignment_title'][$i];
                $assignmentUser->assignment_file    = $request['assignment_file'][$i];
                $assignmentUser->save();
            }


            if($assignmentUser->save()){
                return redirect()->route('exams.show', $batch_id)->with('gmsg','Exam Submitted successfully. Check your Result');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }

    }

    

    
     /**
     * Display the specified Exam.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        $user = Auth::user();
        $batch = Exam::where('user_id',$user->id)->max('batch_id');
        $batches = Exam::where('batch_id',$batch)->get();
        
        return view('exams.show_exams',compact('exam','batches'));
    }


    /**
     * Show Exam Edit Page.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return view('exams.update_exams',compact('exam'));
    }

    /**
     * Update the specified Exam in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        
        $validate = $this->validate($request,[
            'exam_code'      =>  'required|string|max:255',
            'exam_name'      =>  'required|string|max:255',
            'exam_status'    =>  'required',
        ]);
        if($validate)
        {

            $exam->exam_code = $request->exam_code;
            $exam->exam_name = $request->exam_name;
            $exam->exam_status = $request->exam_status;
            $exam->updated_by    = Auth::user()->fname;

            if($exam->save()){

                return redirect()->route('exams.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="exams_sample.csv";
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
     *  Export items in Exam Table.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function export_exams()
    {
        return Excel::download(new ExamsExport, 'Exams.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $exams = Exam::onlyTrashed()->get();
        $getFields = Exam::onlyTrashed()->count();

        if($getFields > 0){

            return view('exams.deleted_exams',compact('exams'));
        }else{
            return redirect()->route('exams.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single exam.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Exam::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored){

            return redirect()->route('exams.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Exam::onlyTrashed()->restore();
        if($restored){
            return redirect()->route('exams.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Exam.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Exam::where('id',$id)->forceDelete();
        if($isDeleted){
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk exams.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Exam::where('id',$id)->forceDelete();
        }

        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Exam.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Exam::where('id',$id)->delete();
        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk exams.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {
        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Exam::where('id',$id)->delete();
        }

        if($isDeleted){
        
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}

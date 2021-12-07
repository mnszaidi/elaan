<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnswersExport;
use Illuminate\Http\Request;
use App\Models\Answer;
use Auth;

class AnswerController extends Controller
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
        $this->middleware('permission:Admin-export',            ['only' =>   ['export_answers']]);
        $this->middleware('permission:Admin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Admin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Admin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Admin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }
    */

    /**
     * Display Answer listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::get();
        return view('answers.index_answers',compact('answers'));
    }
	
	/**
     * gET Answer.
     *
     * @param  \App\Answer  Answer_code
     * @return \Illuminate\Http\Response
     */
    public function check_answers (Request $request)
    {
       try {
        $getFields = Answer::where('answer_code',$request->answer_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Answer.
     *
     * @param  \App\Answer  Answer_code
     * @return \Illuminate\Http\Response
     */
    public function get_answers (Request $request)
    {
       try {
        $getFields = Answer::where('answer_name',$request->answer_name)->where('answer_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Answer Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('answers.create_answers');
    }

    
    /**
     * Store a newly created Answer in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'answer_code' 	=> 'required|string|max:255|unique:answers',
            'answer_name' 	=> 'required|string|max:255',
            'answer_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Answer::create([
                'answer_code' 	=> $request->answer_code,
                'answer_name' 	=> $request->answer_name,
                'answer_status' => $request->answer_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted){
                return redirect()->route('answers.index')->with('gmsg','Answer created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Answer Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $answers = Answer::latest()->paginate(10);
        
        return view('answers.upload_answers',compact('answers'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Answer CSV Upload Function.
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
                    Answer::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

                return redirect()->route('answers.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('answers.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Answer  $answer
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
     * Display the specified Answer.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
    
        return view('answers.show_answers',compact('answer'));
    }


    /**
     * Show Answer Edit Page.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        return view('answers.update_answers',compact('answer'));
    }

    /**
     * Update the specified Answer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        
        $validate = $this->validate($request,[
            'answer_code'      =>  'required|string|max:255',
            'answer_name'      =>  'required|string|max:255',
            'answer_status'    =>  'required',
        ]);
        if($validate)
        {

            $answer->answer_code = $request->answer_code;
            $answer->answer_name = $request->answer_name;
            $answer->answer_status = $request->answer_status;
            $answer->updated_by    = Auth::user()->fname;

            if($answer->save()){

                return redirect()->route('answers.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="answers_sample.csv";
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
     *  Export items in Answer Table.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function export_answers()
    {
        return Excel::download(new AnswersExport, 'Answers.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $answers = Answer::onlyTrashed()->get();
        $getFields = Answer::onlyTrashed()->count();

        if($getFields > 0){

            return view('answers.deleted_answers',compact('answers'));
        }else{
            return redirect()->route('answers.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single answer.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Answer::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored){

            return redirect()->route('answers.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Answer::onlyTrashed()->restore();
        if($restored){
            return redirect()->route('answers.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Answer.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Answer::where('id',$id)->forceDelete();
        if($isDeleted){
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk answers.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Answer::where('id',$id)->forceDelete();
        }

        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Answer.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Answer::where('id',$id)->delete();
        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk answers.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {
        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Answer::where('id',$id)->delete();
        }

        if($isDeleted){
        
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}

<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TagsExport;
use Illuminate\Http\Request;
use App\Models\Tag;
use Auth;

class TagController extends Controller
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
        $this->middleware('permission:Admin-export',            ['only' =>   ['export_tags']]);
        $this->middleware('permission:Admin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Admin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Admin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Admin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }
    */

    /**
     * Display Tag listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::get();
        return view('tags.index_tags',compact('tags'));
    }
	
	/**
     * gET Tag.
     *
     * @param  \App\Tag  Tag_code
     * @return \Illuminate\Http\Response
     */
    public function check_tags (Request $request)
    {
       try {
        $getFields = Tag::where('tag_code',$request->tag_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Tag.
     *
     * @param  \App\Tag  Tag_code
     * @return \Illuminate\Http\Response
     */
    public function get_tags (Request $request)
    {
       try {
        $getFields = Tag::where('tag_name',$request->tag_name)->where('tag_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Tag Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('tags.create_tags');
    }

    
    /**
     * Store a newly created Tag in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'tag_code' 	=> 'required|string|max:255|unique:tags',
            'tag_name' 	=> 'required|string|max:255',
            'tag_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Tag::create([
                'tag_code' 	=> $request->tag_code,
                'tag_name' 	=> $request->tag_name,
                'tag_status' => $request->tag_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted){
                return redirect()->route('tags.index')->with('gmsg','Tag created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Tag Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $tags = Tag::latest()->paginate(10);
        
        return view('tags.upload_tags',compact('tags'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Tag CSV Upload Function.
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
                    Tag::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

                return redirect()->route('tags.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('tags.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Tag  $tag
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
     * Display the specified Tag.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
    
        return view('tags.show_tags',compact('tag'));
    }


    /**
     * Show Tag Edit Page.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.update_tags',compact('tag'));
    }

    /**
     * Update the specified Tag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        
        $validate = $this->validate($request,[
            'tag_code'      =>  'required|string|max:255',
            'tag_name'      =>  'required|string|max:255',
            'tag_status'    =>  'required',
        ]);
        if($validate)
        {

            $tag->tag_code = $request->tag_code;
            $tag->tag_name = $request->tag_name;
            $tag->tag_status = $request->tag_status;
            $tag->updated_by    = Auth::user()->fname;

            if($tag->save()){

                return redirect()->route('tags.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="tags_sample.csv";
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
     *  Export items in Tag Table.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function export_tags()
    {
        return Excel::download(new TagsExport, 'Tags.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $tags = Tag::onlyTrashed()->get();
        $getFields = Tag::onlyTrashed()->count();

        if($getFields > 0){

            return view('tags.deleted_tags',compact('tags'));
        }else{
            return redirect()->route('tags.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single tag.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Tag::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored){

            return redirect()->route('tags.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Tag::onlyTrashed()->restore();
        if($restored){
            return redirect()->route('tags.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Tag.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Tag::where('id',$id)->forceDelete();
        if($isDeleted){
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk tags.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Tag::where('id',$id)->forceDelete();
        }

        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Tag.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Tag::where('id',$id)->delete();
        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk tags.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {
        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Tag::where('id',$id)->delete();
        }

        if($isDeleted){
        
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}

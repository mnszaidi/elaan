<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoriesExport;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
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
        $this->middleware('permission:Admin-export',            ['only' =>   ['export_categories']]);
        $this->middleware('permission:Admin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Admin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Admin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Admin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }
    */

    /**
     * Display Category listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('categories.index_categories',compact('categories'));
    }
	
	/**
     * gET Category.
     *
     * @param  \App\Category  Category_code
     * @return \Illuminate\Http\Response
     */
    public function check_categories (Request $request)
    {
       try {
        $getFields = Category::where('category_code',$request->category_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Category.
     *
     * @param  \App\Category  Category_code
     * @return \Illuminate\Http\Response
     */
    public function get_categories (Request $request)
    {
       try {
        $getFields = Category::where('category_name',$request->category_name)->where('category_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Category Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('categories.create_categories');
    }

    
    /**
     * Store a newly created Category in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'category_code' 	=> 'required|string|max:255|unique:categories',
            'category_name' 	=> 'required|string|max:255',
            'category_menu'     => 'required|string|max:1',
            'category_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Category::create([
                'category_code' 	=> $request->category_code,
                'category_name' 	=> $request->category_name,
                'category_menu'     => $request->category_menu,
                'category_status' => $request->category_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted){
                return redirect()->route('categories.index')->with('gmsg','Category created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Category Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $categories = Category::latest()->paginate(10);
        
        return view('categories.upload_categories',compact('categories'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Category CSV Upload Function.
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
                    Category::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

                return redirect()->route('categories.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('categories.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Category  $category
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
     * Display the specified Category.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    
        return view('categories.show_categories',compact('category'));
    }


    /**
     * Show Category Edit Page.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.update_categories',compact('category'));
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        
        $validate = $this->validate($request,[
            'category_code'      =>  'required|string|max:255',
            'category_name'      =>  'required|string|max:255',
            'category_menu'      =>  'required|string|max:1',
            'category_status'    =>  'required',
        ]);
        if($validate)
        {

            $category->category_code = $request->category_code;
            $category->category_name = $request->category_name;
            $category->category_menu = $request->category_menu;
            $category->category_status = $request->category_status;
            $category->updated_by    = Auth::user()->fname;

            if($category->save()){

                return redirect()->route('categories.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="categories_sample.csv";
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
     *  Export items in Category Table.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function export_categories()
    {
        return Excel::download(new CategoriesExport, 'Categories.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $categories = Category::onlyTrashed()->get();
        $getFields = Category::onlyTrashed()->count();

        if($getFields > 0){

            return view('categories.deleted_categories',compact('categories'));
        }else{
            return redirect()->route('categories.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single category.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Category::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored){

            return redirect()->route('categories.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Category::onlyTrashed()->restore();
        if($restored){
            return redirect()->route('categories.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Category.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Category::where('id',$id)->forceDelete();
        if($isDeleted){
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk categories.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Category::where('id',$id)->forceDelete();
        }

        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Category.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Category::where('id',$id)->delete();
        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk categories.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {
        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Category::where('id',$id)->delete();
        }

        if($isDeleted){
        
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}

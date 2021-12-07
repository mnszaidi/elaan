<?php

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CurrenciesExport;
use Illuminate\Http\Request;
use App\Models\Currency;
use Auth;

class CurrencyController extends Controller
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
        $this->middleware('permission:Admin-export',            ['only' =>   ['export_currencies']]);
        $this->middleware('permission:Admin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Admin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Admin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Admin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }
    */

    /**
     * Display Currency listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::get();
        return view('currencies.index_currencies',compact('currencies'));
    }
	
	/**
     * gET Currency.
     *
     * @param  \App\Currency  Currency_code
     * @return \Illuminate\Http\Response
     */
    public function check_currencies (Request $request)
    {
       try {
        $getFields = Currency::where('currency_code',$request->currency_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Currency.
     *
     * @param  \App\Currency  Currency_code
     * @return \Illuminate\Http\Response
     */
    public function get_currencies (Request $request)
    {
       try {
        $getFields = Currency::where('currency_name',$request->currency_name)->where('currency_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Currency Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('currencies.create_currencies');
    }

    
    /**
     * Store a newly created Currency in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'currency_code' 	=> 'required|string|max:255|unique:currencies',
            'currency_name' 	=> 'required|string|max:255',
            'currency_symbol'   => 'required|string|max:255',
            'currency_status'   => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Currency::create([
                'currency_code' 	=> $request->currency_code,
                'currency_name' 	=> $request->currency_name,
                'currency_symbol'   => $request->currency_symbol,
                'currency_status'   => $request->currency_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted){
                return redirect()->route('currencies.index')->with('gmsg','Currency created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Currency Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $currencies = Currency::latest()->paginate(10);
        
        return view('currencies.upload_currencies',compact('currencies'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Currency CSV Upload Function.
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
                    Currency::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

                return redirect()->route('currencies.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('currencies.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Currency  $currency
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
     * Display the specified Currency.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
    
        return view('currencies.show_currencies',compact('currency'));
    }


    /**
     * Show Currency Edit Page.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('currencies.update_currencies',compact('currency'));
    }

    /**
     * Update the specified Currency in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        
        $validate = $this->validate($request,[
            'currency_code'      =>  'required|string|max:255',
            'currency_name'      =>  'required|string|max:255',
            'currency_symbol'    =>  'required|string|max:255',
            'currency_status'    =>  'required',
        ]);
        if($validate)
        {

            $currency->currency_code    = $request->currency_code;
            $currency->currency_name    = $request->currency_name;
            $currency->currency_symbol  = $request->currency_symbol;
            $currency->currency_status  = $request->currency_status;
            $currency->updated_by       = Auth::user()->fname;

            if($currency->save()){

                return redirect()->route('currencies.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="currencies_sample.csv";
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
     *  Export items in Currency Table.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function export_currencies()
    {
        return Excel::download(new CurrenciesExport, 'Currencies.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $currencies = Currency::onlyTrashed()->get();
        $getFields = Currency::onlyTrashed()->count();

        if($getFields > 0){

            return view('currencies.deleted_currencies',compact('currencies'));
        }else{
            return redirect()->route('currencies.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single currency.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Currency::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored){

            return redirect()->route('currencies.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Currency::onlyTrashed()->restore();
        if($restored){
            return redirect()->route('currencies.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Currency.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Currency::where('id',$id)->forceDelete();
        if($isDeleted){
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk currencies.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Currency::where('id',$id)->forceDelete();
        }

        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Currency.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Currency::where('id',$id)->delete();
        if($isDeleted){
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk currencies.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {
        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Currency::where('id',$id)->delete();
        }

        if($isDeleted){
        
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}

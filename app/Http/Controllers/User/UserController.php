<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MembersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Auth;
use DB;
use Hash;

class UserController extends Controller
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
        $this->middleware('permission:Admin-export',            ['only' =>   ['export_companies']]);
        $this->middleware('permission:Admin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Admin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Admin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Admin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }*/
    
    /**
     * Display a listing of the index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::with('roles')->get();

        return view('users.index_users',compact('users'));
    }


    /**
     * Display a listing of the activation_requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function deactive_users(Request $request)
    {
        $collection = User::where('userstatus','0')->get();
        $users = $collection->forget(0);

        return view('users.index_users',compact('users'));
    }

    /**
     * gET Shipment.
     *
     * @param  \App\Shipment  Shipment_code
     * @return \Illuminate\Http\Response
     */
    public function check_users (Request $request)
    {
       try {
        $getFields = User::where('email',$request->email)->first();
        return response()->json($getFields, 200);
        } catch (Exception $e) {
            return json(array("Sorry! Data not Fatched"));
            return response()->json([
                //'message' => $e->getMessage();
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $roles = Role::get();

        $office_role = $user->hasAnyRole('Admin', 'Teacher');

        if($office_role){
            $users = User::get();
            return view('users.create_users',compact('users','roles'));
        }else{
            return back()->with('bmsg','Your Account is Not Active, Please Contact APX');
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'             => 'required|email|unique:users,email',
            'username'          => 'required|string|max:255|unique:users',
            'fname'             => 'required|string|max:255',
            'lname'             => 'required|string|max:255',
            'password'          => 'required|same:confirm-password',
            'roles'             => 'required'
        ]);

        $profile_pic = 'mem_avatar.jpg';
        if($file = $request->file('profile_pic'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $profile_pic = "profile_pic_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads/images',$profile_pic);
        }

        $input = $request->all();
        $input['profile_pic']   = $profile_pic;
        $input['created_by']    = Auth::user()->fname;
        $input['password']      = Hash::make($input['password']);


        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        $user->created_by = Auth::user()->fname;
        $user->save();

        // Send Welcome Email to New User
        //Mail::to($request->email)->send(new WelcomeNewUserMail());
            return redirect()->route('users.index')->with('gmsg','User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show_users',compact('user'));
    }

     /**
     *  Show items in recylebin.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $users = User::onlyTrashed()->get();
       
        if($users){
            return view('users.deleted_users',compact('users'));
        }else{
            return redirect()->route('users.index')->with('dmsg','Dont Worry! There is nothing Deleted!...');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);

        if($user->user_name =='Admin') {
            return redirect()->route('users.index')
                        ->with('Admin','Admin can not be changed.');
        }else{

            $roles = Role::get();
            //$roles = Role::pluck('name','name')->all();
            $userRoles = $user->roles->pluck('name','name')->all();
            return view('users.update_users',compact('user','roles','userRoles'));
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email'             => 'required|email|unique:users,email,'.$id,
            'username'          => 'required|string|max:255',
            'fname'             => 'required|string|max:255',
            'lname'             => 'required|string|max:255',
            'password'          => 'sometimes|same:confirm-password',
            'roles'             => 'required',
            
        ]);


        $input = $request->all();
        
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }

        $user = User::find($id);
        $user->update($input);
        

        $DbInserted = DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        $user->updated_by = Auth::user()->fname;
        $user->save();

            return redirect()->route('users.index')->with('gmsg','User updated successfully');
       
    }


    /**
     * Upoad Member Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $users = User::latest()->paginate(10);
        return view('users.upload_users',compact('users'));
    }

    /**
     * Member CSV Upload Function.
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
                    User::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

                return redirect()->route('users.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('users.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Member  $member
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
     * Single Restore the User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = User::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored){
        
            return redirect()->route('users.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Bulk Restore the Users from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = User::onlyTrashed()->restore();
        if($restored)
        {
            return redirect()->route('users.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }


    /**
     * Trash the User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDeleted = User::where('id',$id)->delete();
        if($isDeleted){
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete the User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = User::where('id',$id)->forceDelete();
        if($isDeleted){
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }
}
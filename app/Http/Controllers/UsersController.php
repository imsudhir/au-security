<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $result['data']=Users::all();
        $result['data']=Users::all()->where('role',2);
        return view('admin.guard', $result);
    }
    public function newjobs()
    {
         $result['data']= DB::table('requirements')
         ->where('requirement','>',0)
         ->where('approve','=',1)
         ->get();

        return view('guard.newJobs', $result);
    }
    //start guard panel
    public function guard(Request $request)
    {
     if($request->session()->has('GUARD_LOGIN')){
        return redirect('guard/dashboard');
        }else{
        return view('guard.login');
        }
        return view('guard.login');
    }
    public function auth(Request $request)
    {
        $login_id = $request->post('login_id');
        $login_password = $request->post('login_password');
        // $result = Users::where(['login_id'=>$login_id,'login_password'=>$login_password])->get();
        $result = Users::where(['login_id'=>$login_id,'role'=>2,'active_status'=>1])->first();
         if($result != null){
            if(Hash::check($request->post('login_password'), $result->login_password)){
            $request->session()->put('GUARD_LOGIN',true); 
            $request->session()->put('GUARD_ID',$result->id);
            $request->session()->put('GUARD_NAME',$result->f_name.' '.$result->l_name);
            return redirect ('guard/dashboard');
        }else{
            $request->session()->flash('error','Please enter correct user details..');
            return redirect ('guard');
         }
        } else{
            $request->session()->flash('error','Please enter correct user details..');
            return redirect ('guard');
        }
    }
    public function dashboard()
    {
        return view('guard.dashboard');
    }
    //end guard panel



 //start client panel

 public function client_dashboard()
 {
     return view('client.dashboard');
 }
 //end client panel






    public function view_details($id)
    {
        $model['data']=Users::find($id);
        // $result['data']=Users::all()->where('role',2);
        return view('admin/view_details', $model);
    }
    public function verify_status(Request $request,$verify_status,$id)
    {
        //
       if($verify_status == 1){
        $msg = 'Guard Verified successfuly';
       }else{
        $msg = 'Guard Un verified successfuly';

       }
        
        $model=Users::find($id);
        $model->verify_status=$verify_status;
        $model->save();
       
        $request->session()->flash('message',$msg);
        return redirect('admin/guard');
        
    }
    public function active_status(Request $request,$active_status,$id)
    {
        //
        echo $active_status;
       if($active_status == 1){
        $msg = 'Guard activated successfuly';
       }else{
        $msg = 'Guard deactivated successfuly';
       }
        
        $model=Users::find($id);
        $model->active_status=$active_status;
        $model->save();
        
        $request->session()->flash('message',$msg);
        return redirect('admin/guard');
        
    }

    function guard_application_form(Request $request){

   
        return view('guard_application_form');
    }
    

    public function guard_application_form_process(Request $request)
{
    
    // return $request;
    
    $request->validate([
        'f_name'=>'required',
        'l_name'=>'required',
        'email'=>'required',
        'mobile'=>'required',
        'address'=>'required',
        'state'=>'required',
        'city'=>'required',
        'pincode'=>'required',
        'file'=>'required',
        ]);
    $model = new Users();
    $msg = "Application Form Submitted Successfuly";
    $resume=$request->file('file');
    $extn=$resume->extension();
    $file=time().'.'.$extn;
    $model->f_name=$request->post('f_name');
    $model->l_name=$request->post('l_name');
    $model->email=$request->post('email');
    $model->mobile=$request->post('mobile');
    $model->position=$request->post('position');
    $model->address=$request->post('address');
    $model->state=$request->post('state');
    $model->city=$request->post('city');
    $model->pincode=$request->post('pincode');
    $model->resume=$file;
    $resume->storeAS('/public/media',$file);
    $model->save();
    $request->session()->flash('message',$msg);
    return redirect('/career');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}

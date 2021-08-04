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
//     public function newjobs()
//     {
//         return $alljob= DB::table('requirements')
//          ->where('requirement','>',0)
//          ->where('approve','=',1)
//          ->get();
//         foreach ($alljob as $value) {
//            # code...
//            print_r($alljob);
//            $result['data']= $value;

//         //    print_r($value);
//                $accepted_by = json_decode($value->accepted_by);
//                 // in_array(session('GUARD_ID'),json_decode($value->accepted_by));
//             //    if(in_array(session('GUARD_ID'),json_decode($value->accepted_by))){
//             //    $result['data']= $value;
//             //   }
//     }
//  return 'test';

//     return $result['data'];
//         return view('guard.newJobs', $result);
//     }
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

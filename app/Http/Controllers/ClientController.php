<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Users;
use App\Models\Client;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //update password with hashing to database
    // public function updatepassword()
    // {
    //     $r = Admin::find(1);
    //     $r->password=Hash::make('admin');
    //     $r->save();
    // }

        
    public function client(Request $request)
    {
     if($request->session()->has('CLIENT_LOGIN')){
        return redirect('client/jobs');
        }else{
        return view('client.login');
        }
        return view('client.login');
    }
    public function client_auth(Request $request)
    {
        $login_id = $request->post('login_id');
        $login_password = $request->post('login_password');
        // $result = Users::where(['login_id'=>$login_id,'login_password'=>$login_password])->get();
        $result = Users::where(['login_id'=>$login_id,'role'=>3,'active_status'=>1])->first();
         if($result != null){
            if(Hash::check($request->post('login_password'), $result->login_password)){
            $request->session()->put('CLIENT_LOGIN',true); 
            $request->session()->put('CLIENT_ID',$result->id);
            $request->session()->put('CLIENT_NAME',$result->name);
            return redirect ('client/jobs');
        }else{
            $request->session()->flash('error','Please enter correct user details..');
            return redirect ('client');
         }
        } else{
            $request->session()->flash('error','Please enter correct user details..');
            return redirect ('client');
        }
    }


 // start client panel
 function clientJobs(){
    $result['data']=Requirement::all()->where('client_id',session('CLIENT_ID'));
    return view('client.myJobs', $result);

}
function job_manage(Request $request,$id=''){

    if($id>0){
        $arr=Requirement::where(['id'=>$id])->get();
        $result['client_name']=$arr['0']->client_name;
        $result['requirement']=$arr['0']->requirement;
        $result['location_address']=$arr['0']->location_address;
        $result['city']=$arr['0']->city;
        $result['pincode']=$arr['0']->pincode;
        $result['in_time']=$arr['0']->in_time;
        $result['out_time']=$arr['0']->out_time;
        $result['id']=$id;

       } else{
       $result['client_name']='';
       $result['requirement']='';
       $result['location_address']='';
       $result['city']='';
       $result['pincode']='';
       $result['in_time']='';
       $result['out_time']='';
       $result['id']='';
    //    return $result;

   }
    return view('client.job_manage', $result);
}

public function manage_job_process(Request $request)
{
    //
    $request->validate([
        'requirement'=>'required',
        'in_time'=>'required',
        'out_time'=>'required',
        'location_address'=>'required',
        'city'=>'required',
        'pincode'=>'required',
        ]);
    if($request->post('id')>0){
        $model=new coupon();
        $model=Coupon::find($request->post('id'));
        $msg="Coupon Updated Successfuly";
    }else{
    $model=new coupon();
    $msg="Coupon Added Successfuly";

    }
    $model->title=$request->post('title');
    $model->code=$request->post('code');
    $model->value=$request->post('value');
    $model->status=1;
    $model->save();
    $request->session()->flash('message',$msg);
    return redirect('admin/coupon');
}
}
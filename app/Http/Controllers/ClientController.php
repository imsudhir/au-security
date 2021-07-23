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
            $request->session()->put('CLIENT_NAME',$result->f_name.' '.$result->l_name);
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
    $result['data']=Requirement::orderBy('id', 'desc')
    ->where('client_id',session('CLIENT_ID'))->get();
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
        $result['join_date']=$arr['0']->join_date;
        $result['leave_date']=$arr['0']->leave_date;
        $result['in_time']=$arr['0']->in_time;
        $result['out_time']=$arr['0']->out_time;
        $result['id']=$id;

       } else{
       $result['client_name']='';
       $result['requirement']='';
       $result['location_address']='';
       $result['city']='';
       $result['pincode']='';
       $result['join_date']='';
       $result['leave_date']='';
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
    // return $request->requirement;
    $request->validate([
        'requirement'=>'required',
        'join_date'=>'required',
        'leave_date'=>'required',
        'in_time'=>'required',
        'out_time'=>'required',
        'location_address'=>'required',
        'city'=>'required',
        'pincode'=>'required',
        ]);
    if(($request->id)>0){
        $model=new Requirement();
        $model=Requirement::find($request->post('id'));
        $msg="Requirement Updated Successfuly";
    }else{
     $model=new Requirement();
    $msg="Requirement Added Successfuly";

    }

    $model->client_name=session('CLIENT_NAME');
    $model->client_id=session('CLIENT_ID');
    $model->requirement=$request->post('requirement');
    $model->location_address=$request->post('location_address');
    $model->city=$request->post('city');
    $model->pincode=$request->post('pincode');
    $model->join_date=$request->post('join_date');
    $model->leave_date=$request->post('leave_date');
    $model->in_time=$request->post('in_time');
    $model->out_time=$request->post('out_time');
    $model->requirement_accepted=0;
    $model->status='pending';
    $model->approve=0;
    $model->save();
    $request->session()->flash('message',$msg);
    return redirect('client/jobs');
}

public function update_job_status(Request $request)
{
    //
        $model=new Requirement();
        $model=Requirement::find($request->post('jobid'));
        $msg="Status Updated Successfuly";

    $model->status = $request->post('status');
    $model->save();
    $request->session()->flash('message',$msg);
    return redirect('admin/newjobs');
}


}
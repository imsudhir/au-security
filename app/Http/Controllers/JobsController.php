<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use App\Models\Jobs;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function accept(Request $request, $id='')
    {
        // 
        $requirement=Requirement::find($id);
        $accepted_by = json_decode($requirement->accepted_by);
        $is_job_accepted_by_guard1 = array_search(session('GUARD_ID'),$accepted_by);

        if(empty($is_job_accepted_by_guard1)>0){
            // return $accepted_by;
            array_push($accepted_by,session('GUARD_ID'));
            $requirement->accepted_by=$accepted_by;
            $requirement->save();
         $result['data']=Requirement::find($id);
        $model=new Jobs();
        // Jobs::all();
        // return $result['data'];
        
        $model->req_id=$id;
        $model->guard_id=session('GUARD_ID');   
        $model->client_name=$result['data']->client_name;
        $model->location_address=$result['data']->location_address;
        $model->city=$result['data']->city;
        $model->pincode=$result['data']->pincode;
        $model->in_time=$result['data']->in_time;
        $model->out_time=$result['data']->out_time;
        $model->save();
        $result['data']->requirement_accepted=$result['data']->requirement_accepted+1;
        $result['data']->save();
        $msg="Job Accepted Successfuly";
        $request->session()->flash('jobmessage',$msg);
        return redirect('guard/newjobs');
        }
    }
    function myJobs(){
        $result['data']=Jobs::all()->where('guard_id',session('GUARD_ID'));
        $result['data'];
        return view('guard.myJobs', $result);

    }
    function jobdetails ($jobid){
        $result['data']=Jobs::find($jobid);
        return view('guard.jobdetails', $result);
    }
    function attendance_mgmt ($jobid){
        $result['data']=Jobs::find($jobid);
        return view('guard.attendance', $result);
    }
   
    function signin (Request $request, $jobid){
        // return $request;
        
        $request->validate([
            'sign_in_image'=>'required|mimes:jpg,jpeg,png'
        ]);
        $sign_in_image=$request->file('sign_in_image');
        $extn=$sign_in_image->extension();
        $file=time().'.'.$extn;
        
        $myjob = Jobs::find($jobid);
        $myjob->sign_in_image=$file;
        $myjob->save();
        $result['data']=Jobs::find($jobid);
        
        $sign_in_image->storeAS('/public/media',$file);
        return redirect('guard/myJobs');
    }
    function signout (Request $request, $jobid){
        // return $request;
        
        $request->validate([
            'sign_out_image'=>'required|mimes:jpg,jpeg,png'
        ]);
      
        $sign_out_image=$request->file('sign_out_image');
        $extn=$sign_out_image->extension();
        $file=time().'.'.$extn;
        $result['data']=Jobs::find($jobid);
        $myjob = Jobs::find($jobid);
        $myjob->sign_out_image=$file;
        $myjob->save();
        $sign_out_image->storeAS('/public/media',$file);
        return redirect('guard/myJobs');
    }
}

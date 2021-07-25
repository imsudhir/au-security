<?php

namespace App\Http\Controllers;
use App\Models\Attendances;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //
    function attendance_mgmt ($jobid){
         $result['jobid']=$jobid;
        
        //  return gettype($result);
        return view('guard.attendance_mgmt', $result);
    }
    function signin (Request $request, $jobid){
        
        $request->validate([
            'sign_in_image'=>'required|mimes:jpg,jpeg,png'
        ]);
        $sign_in_image=$request->file('sign_in_image');
        $extn=$sign_in_image->extension();
        $file=time().'.'.$extn;
        $job_in_attendance= new Attendances();
        $job_in_attendance->job_id=$jobid;
        $job_in_attendance->date=date('Y-m-d');
        $job_in_attendance->sign_in_image=$file;
        $job_in_attendance->user_id=session('GUARD_ID');
        $job_in_attendance->save();
        $sign_in_image->storeAS('/public/media',$file);
        $msg="Sign in with image successfuly";
        $request->session()->flash('signinmessage',$msg);
        $job_in_attendance->id;
        return redirect('guard/myJobs');
    }
    function signout (Request $request, $jobid){
  
        $request->validate([
            'sign_out_image'=>'required|mimes:jpg,jpeg,png'
        ]);
      
        $sign_out_image=$request->file('sign_out_image');
        $extn=$sign_out_image->extension();
        $file=time().'.'.$extn;
        $job_out_attendance=Attendances::where(['date'=>date('Y-m-d'),'user_id'=>session('GUARD_ID'),'job_id'=>$jobid])->first();
        $job_out_attendance->sign_out_image=$file;
        $job_out_attendance->save();
        $sign_out_image->storeAS('/public/media',$file);

        $msg="Signout with image successfuly";
        $request->session()->flash('signoutmessage',$msg);
        return redirect('guard/myJobs');
    }
}

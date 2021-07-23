<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Requirement;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class LandingpageController extends Controller
{
    //
    function Landingpage(){
        return view('frontend.Landingpage');
    }
    function guard_application_form(Request $request){

   
        return view('frontend.guard_application_form');
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
        'licence_type'=>'required',
        'resume'=>'required',
        ]);
    $model = new Users();
    $msg = "Application Form Submitted Successfuly";
    $resume=$request->file('resume');
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
    $model->additional_information=$request->post('additional_information');
    $model->licence_type=$request->post('licence_type');
    $model->role=2;
    $model->resume=$file;
    $resume->storeAS('/public/media',$file);
    $model->save();
    $request->session()->flash('message',$msg);
    return redirect('/career');
}
}

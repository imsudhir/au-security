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
    function about(){
        return view('frontend.about');
    }
    function contact(){
        return view('frontend.contact');
    }
    function asset_security(){
        return view('frontend.asset_security');
    }
    function cctv_cameras_installations(){
        return view('frontend.cctv_cameras_installations');
    }
    function construction_sites(){
        return view('frontend.construction_sites');
    }
    function corporate_security(){
        return view('frontend.corporate_security');
    }
    function guard_hireing_and_recruitment(){
        return view('frontend.guard_hireing_and_recruitment');
    }
    function mobile_patrol_alar_response(){
        return view('frontend.mobile_patrol_alar_response');
    }
    function residential_building_concierge(){
        return view('frontend.residential_building_concierge');
    }
    function retail_security(){
        return view('frontend.retail_security');
    }
    function rsl_lagues_bowling_clubs_and_pubs(){
        return view('frontend.rsl_lagues_bowling_clubs_and_pubs');
    }
    function shopping_malls(){
        return view('frontend.shopping_malls');
    }
    function special_duties(){
        return view('frontend.special_duties');
    }
    
    function crowd_control_and_private_event_security (){
        return view('frontend.crowd_control_and_private_event_security ');
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
        'resume'=>'required|mimes:jpg,jpeg,png,docx,pdf',
        ]);
    $model = new Users();
    $msg = "Application Form Submitted Successfuly";
    if ($request->post('licence_type')==='Security Officer') {
        $role=2;
    } else{
        $role=2;
    }
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
    $model->role=$role;
    $model->resume=$file;
    $resume->storeAS('/public/media',$file);
    $model->save();
    $request->session()->flash('message',$msg);
    return redirect('/career');
}
}

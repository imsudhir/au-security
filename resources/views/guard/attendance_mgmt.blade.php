@extends('guard/layout')
@section('page_title','My Jobs')
@section('myJobs_selected','active')
@section('container')
 
    <div class="row card card-body pt-2 pr-5 pb-5 pl-5">
        <h2 class="mb-2">Attendence</h2>
{{-- {{$data}}
{{$data[0]->id}}
{{exit}} --}}
        <div class="col-lg-12">
        <hr style="border-bottom:5px solid black;">

            @if(session('message')!==null)
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
            @endif
        </div>
        <div class="container-fluid">
  <div class="row">
            <div class="col-lg-6 col-md-6 pt-2 pr-5 p b-5 pl-5 mr">
            <div class="card card-body ">
                        <!-- <img id="blah" alt="your image" style="margin:auto;" wid th="100" height="auto" /> -->
                        <!-- <a href="#" class="btn mr-2"><i class="fas fa-link"></i> upload </a>  -->
                        <!-- <input class="btn p-5" type="file" style="opacity: 0;" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <a id="signin_upload" href="#" class="btn btn-primary btn-lg">submit </a>  -->
                        <form id="demo-form1" action="{{url('/guard/attendance_management/signin')}}/{{$jobid}}" enctype="multipart/form-data" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="item form-group">
                    <div class="col-md-9 col-sm-9 ">
                        <img  id="sign_in_image" alt="your image" src="" style="margin:auto;" wid th="100" height="auto" />
                        <input type="file" name="sign_in_image" class="btn p-5" style="opacity: 0; margin:auto;" onclick="yy()" onchange="document.getElementById('sign_in_image').src = window.URL.createObjectURL(this.files[0])" />
                        <!-- <input type="file" name="sign_in_image" /> -->
                        @error('sign_in_image')
                        <span class="field_error">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="ln_solid"></div>
                    <input type="hidden" name="jobid-i" value="22" /> 

                    <button type="submit" id="signin_upload" href="#" class="btn btn-primary btn-lg">sign in </button>  

                </form>
            </div>
            </div>

    <div class="col-lg-6 col-md-6 pt- 2 pr- 5 pb- 5 pl- 5">
    <div class="card card-body">
                        
                <form id="demo-form2" action="{{url('/guard/attendance_management/signout')}}/{{$attendanceid}}" enctype="multipart/form-data" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="item form-group">
                    <div class="col-md-9 col-sm-9 ">
                        <img  id="sign_out_image" alt="your image" src="" style="margin:auto;" wid th="100" height="auto" />
                        <input type="file" name="sign_out_image" class="btn p-5" style="opacity: 0; margin:auto;" onclick="yy()" onchange="document.getElementById('sign_out_image').src = window.URL.createObjectURL(this.files[0])" />
                        <!-- <input type="file" name="sign_out_image" /> -->
                        @error('sign_out_image')
                        <span class="field_error">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="ln_solid"></div>
                    <input type="hidden" name="jobid-s" value="22" /> 

                    <button type="submit" id="signout_upload" href="#" class="btn btn-primary btn-lg">sign out </button>  

                </form>

            </div>
            </div>

  </div>
  <!-- row -->
</div><!-- container -->
</div>
    
    
@endsection
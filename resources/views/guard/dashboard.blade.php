@extends('guard/layout')
@section('page_title','Dashboard')
@section('dashboard_selected','active')

@section('container')
{{-- <div class="row">Dashboard</div> --}}
<div class="row m-t-25">
    <a href="" class="col-sm-6 col-lg-6">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix text-center">
                    <div class="text text-center mb-5">
                        <div class="icon">
                            {{-- <i class="zmdi zmdi-account-o"></i> --}}
                            <i class="fa fa-user-secret"></i>
                            <h2 style="fon t-size: 18px !important">Completed Jobs </h2>
                            <h2> 
                                n/a
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </a>
    <a href="" class="col-sm-6 col-lg-6">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix text-center">
                    <div class="text text-center mb-5">
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                            <h2 style="fon t-size: 18px !important">New Jobs</h2>
                            <h2>   
                                n/a
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    
 
     
  
</div>
    
@endsection
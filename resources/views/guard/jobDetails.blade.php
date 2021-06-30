@extends('guard/layout')
@section('page_title','My Jobs')
@section('myJobs_selected','active')
@section('container')
 
    <div class="row card card-body pt-2 pr-5 pb-5 pl-5">
        <h2 class="mb-2">Jobs details</h2>
     
        <div class="col-lg-12">
            <a class="btn btn-warning" href="{{url('guard/myJobs')}}">
                < Back   
                 </a>
        <hr style="border-bottom:5px solid black;">

            @if(session('message')!==null)
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
            @endif
            
        </div>
     

                <div class="container">
   
   
                    <div class="form-group">
                     <div class="form-group">
                      <label for="pwd">Client:</label>
                      <p>{{$data->client_name}}</p>
                    </div>
                    <div class="form-group">
                      <label for="pwd">Address:</label>
                      <p>{{$data->location_address}}</p>
                    </div>
                    <div class="form-group">
                      <label for="pwd">City:</label>
                      <p>{{$data->city}}</p>
                    </div><div class="form-group">
                      <label for="pwd">Pincode:</label>
                      <p>{{$data->pincode}}</p>
                    </div>
                    <div class="form-group">
                      <label for="pwd">In Time:</label>
                      <p>{{$data->in_time}}</p>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Out Time:</label>
                        <p>{{$data->out_time}}</p>
                      </div>
                    </div>
                    
                     
                   
                   
                </div>
        
    </div>
    
    
@endsection
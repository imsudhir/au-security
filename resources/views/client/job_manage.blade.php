@extends('client/layout')
@section('page_title','My Jobs')
@section('myJobs_selected','active')
@section('container')
 
    <div class="row card card-body pt-2 pr-5 pb-5 pl-5">
        <h2 class="mb-2">Manage Jobs</h2>
        <hr style="border-bottom:5px solid black;">
        <div class="col-lg-12">
            @if(session('message')!==null)
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
            @endif
            
        </div>
 <a href="{{url('client/jobs')}}" class="btn btn-md btn-info mb-3">Back</a> 
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">{{$id}}
                <form action="{{route('client.manage_job_process')}}" method="post">
                    @csrf
                  
                   
                    <div class="form-group has-success">
                        <label for="requirement" class="control-label mb-1">Requirement</label>
                        <input id="requirement" value="{{$requirement}}" name="category_slug" type="text" 
                        class="form-control cc-name valid" data-val="true" data-val-required="Please enter number of guard"
                            autocomplete="requirement" >
                            @error('requirement')
                            <span class="text-danger" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="in_time" class="control-label mb-1">In Time</label>
                        <input id="in_time" value="{{$in_time}}" name="in_time" type="text" class="form-control"  aria-invalid="false" >
                        @error('in_time')
                            <span class="text-danger" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                        
                    </div>
                    <div class="form-group">
                        <label for="out_time" class="control-label mb-1">Out Time</label>
                        <input id="out_time" value="{{$out_time}}" name="out_time" type="text" class="form-control"  aria-invalid="false" >
                        @error('out_time')
                            <span class="text-danger" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                        
                    </div>
                    <div class="form-group">
                        <label for="location_address" class="control-label mb-1">Location Address</label>
                        <input id="location_address" value="{{$location_address}}" name="location_address" type="text" class="form-control"  aria-invalid="false" >
                        @error('location_address')
                            <span class="text-danger" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                        
                    </div>
                    <div class="form-group">
                        <label for="city" class="control-label mb-1">City</label>
                        <input id="city" value="{{$city}}" name="city" type="text" class="form-control"  aria-invalid="false" >
                        @error('city')
                            <span class="text-danger" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                        
                    </div>
                    <div class="form-group">
                        <label for="pincode" class="control-label mb-1">Pincode</label>
                        <input id="pincode" value="{{$pincode}}" name="pincode" type="text" class="form-control"  aria-invalid="false" >
                        @error('pincode')
                            <span class="text-danger" role="alert">
                                {{$message}}
                            </span>
                            @enderror
                        
                    </div>
                 
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Submit
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                    </div>
                    <input type="hidden" name="id" value="{{$id}}" />
                </form>
            </div>
        </div>
    </div>
     
</div>
 
    
@endsection
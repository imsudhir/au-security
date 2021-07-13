@extends('client/layout')
@section('page_title','Manage Job')
@section('managejob_selected','active')
@section('container')

<div class="row card card-body pt-2 pr-5 pb-5 pl-5">
    <h2 class="mb-2">Manage Jobs</h2>
    <hr style="border-bottom:5px solid black;">
    <div class="col-lg-12">
        @if(session('message')!==null)
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

    </div>
    <a href="{{ url('client/jobs') }}" class="btn btn-md btn-info mb-3">Back</a>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('guard_application_form_process') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="f_name" class="control-label mb-1">first name</label>
                            <input id="f_name" value="" name="f_name" type="text"
                                aria-invalid="false" class="form-control" placeholder="Please enter f_name">
                            @error('f_name')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                     
                        <div class="form-group">
                            <label for="l_name" class="control-label mb-1">last name</label>
                            <input id="l_name" value="" name="l_name" type="text"
                                aria-invalid="false" class="form-control" placeholder="Please enter l_name">
                            @error('l_name')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label mb-1">Email</label>
                            <input id="email" value="" name="email" type="email" class="form-control"
                                aria-invalid="false" placeholder="Please enter email">
                            @error('email')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="mobile" class="control-label mb-1">Phone Number</label>
                            <input id="mobile" value="" name="mobile" type="text" class="form-control"
                                aria-invalid="false" placeholder="Please enter mobile">
                            @error('mobile')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label mb-1">Address</label>
                            <input id="address" value="" name="address" type="text"
                                aria-invalid="false" class="form-control" placeholder="Please enter address">
                            @error('address')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="state" class="control-label mb-1">State</label>
                            <input id="state" value="" name="state" type="text"
                                aria-invalid="false" class="form-control" placeholder="Please enter state">
                            @error('state')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="city" class="control-label mb-1">City</label>
                            <input id="city" value="" name="city" type="text"
                                aria-invalid="false" class="form-control" placeholder="Please enter city">
                            @error('city')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pincode" class="control-label mb-1">Pincode</label>
                            <input id="pincode" value="" name="pincode" type="number"
                                aria-invalid="false" class="form-control" placeholder="Please enter pincode">
                            @error('pincode')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="resume" class="control-label mb-1">Resume</label>
                            <input id="resume" value="" name="file" type="file"
                                aria-invalid="false" class="form-control" placeholder="Please upload resume">
                            @error('resume')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                Submit
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


    @endsection

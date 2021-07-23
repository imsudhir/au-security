@extends('client/layout')
@section('page_title','Manage Job')
@section('managejob_selected','active')
@section('container')

<div class="row card card-body pt-2 pr-5 pb-5 pl-5">
    <h2 class="mb-2">Add Job</h2>
    <hr style="border-bottom:5px solid black;">
    <div class="col-lg-12">
        @if(session('message')!==null)
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('client.manage_job_process') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="requirement" class="control-label mb-1">Requirement</label>
                            <input id="requirement" value="{{ $requirement }}" name="requirement" type="text"
                                aria-invalid="false" class="form-control" placeholder="Please enter number of guard">
                            @error('requirement')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <label for="in_time" style="text-align:center" class="control-label mb-1">Contract period</label>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="join_date" class="control-label mb-1">Joining Date</label>
                                    <input id="join_date" value="{{ $join_date }}" name="join_date" type="date"
                                        class="form-control" aria-invalid="false">
                                    @error('join_date')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="leave_date" class="control-label mb-1">Last date</label>
                                    <input id="leave_date" value="{{ $leave_date }}" name="leave_date" type="date"
                                        class="form-control" aria-invalid="false">
                                    @error('leave_date')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="in_time" class="control-label mb-1">In Time</label>
                                    <input id="in_time" value="{{ $in_time }}" name="in_time" type="datetime-local"
                                        class="form-control" aria-invalid="false">
                                    @error('in_time')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="out_time" class="control-label mb-1">Out Time</label>
                                    <input id="out_time" value="{{ $out_time }}" name="out_time" type="datetime-local"
                                        class="form-control" aria-invalid="false">
                                    @error('out_time')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                </div>

                            </div>
                        </div>
                       


                        <div class="form-group">
                            <label for="location_address" class="control-label mb-1">Location Address</label>
                            <input id="location_address" value="{{ $location_address }}" name="location_address"
                                type="text" class="form-control" aria-invalid="false" placeholder="Please enter address">
                            @error('location_address')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="city" class="control-label mb-1">City</label>
                            <input id="city" value="{{ $city }}" name="city" type="text" class="form-control"
                                aria-invalid="false" placeholder="Please enter city">
                            @error('city')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="pincode" class="control-label mb-1">Pincode</label>
                            <input id="pincode" value="{{ $pincode }}" name="pincode" type="text" class="form-control"
                                aria-invalid="false" placeholder="Please enter pincode">
                            @error('pincode')
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
                        <input type="hidden" name="id" value="{{ $id }}" />
                    </form>
                </div>
            </div>
        </div>

    </div>


    @endsection

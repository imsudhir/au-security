@extends('guard/layout')
@section('page_title','My Jobs')
@section('myJobs_selected','active')
@section('container')
 
    <div class="row card card-body pt-2 pr-5 pb-5 pl-5">
        <h2 class="mb-2">My Jobs</h2>
        <hr style="border-bottom:5px solid black;">

        <div class="col-lg-12">
            @if(session('message')!==null)
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
            @endif
            @if(session('signinmessage')!==null)
            <div class="alert alert-success" role="alert">
                {{session('signinmessage')}}
            </div>
            @endif
            @if(session('signoutmessage')!==null)
            <div class="alert alert-success" role="alert">
                {{session('signoutmessage')}}
            </div>
            @endif
        </div>
        <table id="example" class="display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th width="2%">Id</th>
                    <th width="10%">Client Name</th>
                    <th width="2%" class="te xt-right">Date</th>
                    <th width="2%" class="te xt-right">Join date</th>
                    <th width="2%" class="te xt-right">Releave Date</th>
                    <th width="2%" class="te xt-right">In time </th>
                    <th width="2%" class="te xt-right">Out time</th>
                    <th width="30%" class="te xt-right">Address</th>
                    <th width="30%" class="te xt-right">City</th>
                    <th width="30%" class="te xt-right">Pincode</th>
                    <th width="40%" class="te xt-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->client_name}}</td>
                    <td>{{$list->date}}</td>
                    <td>{{$list->join_date}}</td>
                    <td>{{$list->releavedate}}</td>
                    <td>{{$list->in_time}}</td>
                    <td>{{$list->out_time}}</td>
                    <td>{{$list->location_address}}</td>
                    <td>{{$list->city}}</td>
                    <td>{{$list->pincode}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                         {{-- <a class="btn btn-primary" href="{{url('admin/guard/view_details')}}/{{$list->id}}">
                            View     
                        </a> --}}
                       
                           @if ($list->approve == 1)
                           <a class="btn btn-primary" href="{{url('admin/newjobs/approve/0')}}/{{$list->id}}">
                             Approved    
                           </a>
                           <a class="btn btn-primary" href="{{url('admin/newjobs/broadcast/')}}/{{$list->id}}">
                            Brodcast    
                          </a>
                           @endif
                           <a class="btn btn-primary" href="{{url('guard/job-details')}}/{{$list->id}}">
                            View details     
                             </a>
                             <a class="btn btn-success" href="{{url('guard/attendance_management')}}/{{$list->id}}">
                            Attendence     
                             </a>
                      </div>
                    </td>
                 
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
    
    
@endsection
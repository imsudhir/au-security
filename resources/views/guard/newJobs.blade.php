@extends('guard/layout')
@section('page_title','Guard')
@section('newjobs_selected','active')
    
@section('container')
 
    <div class="row card card-body pt-2 pr-5 pb-5 pl-5">
        <h2 class="mb-2">New Jobs</h2>

        <div class="col-lg-12">
        <hr style="border-bottom:5px solid black;">
            @if(session('message')!==null)
            <div class="alert alert-success" role="alert">
                {{session('message')}}
            </div>
            @endif
            @if(session('jobmessage')!==null)
            <div class="alert alert-success" role="alert">
                {{session('jobmessage')}}
            </div>
            @endif
            
            
        </div>
        <table class="table" id="table">
            <thead>
                <tr>
                    <th width="2%">Id</th>
                    <th width="10%">Client Name</th>
                    <th width="8%" class="text-center">Jobs</th>
                    <th width="2%" class="text-center">Date</th>
                    <th width="2%" class="text-center">In time </th>
                    <th width="2%" class="text-center">Out time</th>
                    <th width="30%" class="text-center">Address</th>
                    <th width="40%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $list)
                <!-- {{empty(array_search(session('GUARD_IDaaa'),json_decode($list->accepted_by)))}} -->
             @if (empty(array_search(session('GUARD_ID'),json_decode($list->accepted_by))))
                 <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->client_name}}</td>
                    <td>{{$list->requirement_accepted}}</td>
                    <td>{{$list->requirement}}</td>
                    <td>{{$list->requirement_date}}</td>
                    <td>{{$list->in_time}}</td>
                    <td>{{$list->out_time}}</td>
                    <td>{{$list->location_address}}</td>
                    <td class="text-center">
                        
                        <div class="btn-group" role="group" aria-label="Basic example">
                           @if ($list->requirement_accepted == $list->requirement)
                           <a class="btn btn-warning" disabled >
                          Job filled    
                           </a>
                           @endif
                           @if ($list->requirement_accepted < $list->requirement)
                           <a class="btn btn-warning" href="{{url('guard/newjobs/accept/')}}/{{$list->id}}">
                          Accept now     
                           </a>
                           @endif
                           <a class="btn btn-warning" href="{{url('guard/job-details')}}/{{$list->id}}">
                            View details     
                             </a>
                      </div>
                    </td>
                 
                </tr>
             @endif
               
                @endforeach
               
            </tbody>
        </table>
    </div>
    
    
@endsection
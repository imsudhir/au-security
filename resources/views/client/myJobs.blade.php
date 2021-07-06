@extends('client/layout')
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
            
        </div>
        
        <table id="example" class="display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th widt h="5%">Id</th>
                    <th widt h="10%">Status</th>
                    <th widt h="8%" class="text-center">No. of jobs</th>
                    <th widt h="5%" class="text-center">In time </th>
                    <th widt h="2%" class="text-center">Out time</th>
                    <th widt h="30%" class="text-center">Address</th>
                    <th widt h="30%" class="text-center">City</th>
                    <th widt h="30%" class="text-center">Pincode</th>
                    <th widt h="40%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td><span class="badge badge-primary">{{$list->status}}</span></td>
                    <td>{{$list->requirement}}</td>
                    <td>{{$list->in_time}}</td>
                    <td>{{$list->out_time}}</td>
                    <td>{{$list->location_address}}</td>
                    <td>{{$list->city}}</td>
                    <td>{{$list->pincode}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                      
                           @if ($list->approve == 1)
                           <a class="btn btn-primary" href="{{url('admin/newjobs/approve/0')}}/{{$list->id}}">
                             Approved    
                           </a>
                          
                           @elseif($list->approve == 0)
                           <a class="btn btn-warning" href="{{url('admin/newjobs/approve/1')}}/{{$list->id}}">
                          Not Approved     
                           </a>
                           @endif
                          
                      </div>
                    </td>
                 
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
    
    
@endsection
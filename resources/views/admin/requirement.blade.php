@extends('admin/layout')
@section('page_title','Guard')
@section('requirements_selected','active')
    
@section('container')
 
    <div class="row card card-body pt-2 pr-5 pb-5 pl-5">
        <h2 class="mb-2">Jobs</h2>
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
                    <th widt h="10%" class="text-center">Client Name</th>
                    <th widt h="8%" class="text-center">No. of jobs</th>
                    <th widt h="8%" class="text-center">Jobs accepted</th>
                    <th widt h="5%" class="text-center">In time </th>
                    <th widt h="2%" class="text-center">Out time</th>
                    <th widt h="30%" class="text-center">Address</th>
                    <th widt h="40%" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->client_name}}</td>
                    <td>{{$list->requirement}}</td>
                    <td>{{$list->requirement_accepted}}</td>
                    <td>{{$list->in_time}}</td>
                    <td>{{$list->out_time}}</td>
                    <td>{{$list->location_address}}</td>
                    <!-- <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                         <a class="btn btn-primary" href="{{url('admin/guard/view_details')}}/{{$list->id}}">
                            View     
                        </a>
                       
                           @if ($list->approve == 1)
                           <a class="btn btn-primary" href="{{url('admin/newjobs/approve/0')}}/{{$list->id}}">
                             Approved    
                           </a>
                           <a class="btn btn-primary" href="{{url('admin/newjobs/broadcast/')}}/{{$list->id}}">
                            Brodcast    
                          </a>
                           @elseif($list->approve == 0)
                           <a class="btn btn-warning" href="{{url('admin/newjobs/approve/1')}}/{{$list->id}}">
                          Not Approved     
                           </a>
                           @endif
                          
                      </div>
                    </td> -->
                 <td>
                 <form action="{{ route('client.update_job_status') }}" method="post">
                        @csrf
                    <div class="form-group form-control-lg">
                    <label for="sel1">Select:</label>
                    <select name="status" class="form-control" id="sel1">
                    <option value="pending" {{$list->status==='pending' ? 'selected':''}}>pending</option>
                    <option value="approved" {{$list->status==='approved' ? 'selected':''}}>approved</option>
                    <option vlaue="processing" {{$list->status==='processing' ? 'selected':''}}>processing</option>
                    <option vlaue="finshed" {{$list->status==='finshed' ? 'selected':''}}>finshed</option>
                    <option vlaue="canceld" {{$list->status==='canceld' ? 'selected':''}}>canceld</option>
                    </select>
                    </div>
                    <input type="hidden" name="jobid" value="{{$list->id}}">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <button id="payment-button" type="submit" class="btn btn-primary">
                        <b>UPDATE</b>
                    </button>
                    @if ($list->status != 'pending')
                    <a class="btn btn-primary" href="{{url('admin/newjobs/broadcast/')}}/{{$list->id}}">
                            <b>BRODCAST</b>    
                    </a>
                    @endif
                </button>
                </form>
                
                 </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
    
    
@endsection
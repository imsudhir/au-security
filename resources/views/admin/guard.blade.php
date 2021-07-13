@extends('admin/layout')
@section('page_title','Guard')
@section('guard_selected','active')

@section('container')
<h2 class="mb-2">Guard</h2>
<div class="row card card-body p-4">

    <div class="col-lg-12">
        @if(session('message')!==null)
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

    </div>
    <table id="example" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>NAME</th>
                <th class="text-center">EMAIL</th>
                <th class="text-center">PHONE NUMBER</th>
                <th class="text-center">ADDRESS</th>
                <th class="text-center">STATE</th>
                <th class="text-center">SUBURB/CITY</th>
                <th class="text-center">ZIP/POSTAL CODE</th>
                <th class="text-center">RESUME</th>
                <th class="text-center">ADDITIONAL INFORMATION</th>
                <th class="text-center">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $list)
                <tr>
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->f_name.' '.$list->l_name }}</td>
                    <td>{{ $list->email }}</td>
                    <td>{{ $list->mobile }}</td>
                    <td>{{ $list->address }}</td>
                    <td>{{ $list->state}}</td>
                    <td>{{ $list->city}}</td>
                    <td>{{ $list->pincode }}</td>
                    <td>{{ $list->resume }}<img width="100px" height="100px" class="mg-thumbnail" src="{{asset('storage/media/1625074218.jpg')}}"></td>
                    <td>{{$list->additional_information}}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                            <!-- <a class="btn btn-primary"
                                href="{{ url('admin/guard/view_details') }}/{{ $list->id }}"
                                data-toggle="tooltip" data-placement="top" title="View details!">
                                <i class="fa fa-eye" aria-hidden="true"></i>

                            </a> -->

                            @if($list->verify_status == 1)
                                <a class="btn btn-primary"
                                    href="{{ url('admin/guard/verify_status/0') }}/{{ $list->id }}"
                                    data-toggle="tooltip" data-placement="top" title="Verified!">
                                    <i class="fa fa-check" aria-hidden="true"></i>

                                </a>
                                @if($list->active_status == 1)
                                    <a class="btn btn-primary"
                                        href="{{ url('admin/guard/active_status/0') }}/{{ $list->id }}">
                                        Active
                                    </a>
                                    <a class="btn btn-warning"
                                    href="{{ url('admin/guard/send_guard_credentials') }}/{{ $list->id }}"
                                    data-toggle="tooltip" data-placement="top" title="Send login details!">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </a>
                                @elseif($list->active_status == 0)
                                    <a class="btn btn-warning"
                                        href="{{ url('admin/guard/active_status/1') }}/{{ $list->id }}">
                                        Deactive
                                    </a>
                                
                                @endif
                            @elseif($list->verify_status == 0)
                                <a class="btn btn-warning"
                                    href="{{ url('admin/guard/verify_status/1') }}/{{ $list->id }}"
                                    data-toggle="tooltip" data-placement="top" title="Not verified">
                                    <i class="fas fa-times"></i>
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

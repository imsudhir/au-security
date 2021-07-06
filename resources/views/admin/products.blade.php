@extends('admin/layout')
@section('page_title','product')
@section('product_selected','active')
    
@section('container')

<div class="row card card-body pt-2 pr-5 pb-5 pl-5">
        <h2 class="mb-2">Products</h2>
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
                            <th>Id</th>
                            <th class="text">Name</th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Short desc</th>
                            <th class="text-center">Long desc</th>
                            <th class="text-center">Tech spec</th>
                            <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $list)
                <tr>
                <td>{{$list->id}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->brand}}</td>
                            <td>{{$list->short_desc}}</td>
                            <td>{{$list->long_desc}}</td>
                            <td>{{$list->tech_spec}}</td>
                    <td>
                    <a href="{{url('admin/product/manage_product')}}/{{$list->id}}">
                                    <button type="button" class="btn btn-success">Edit</button>    
                                   </a>
                               
                                   @if ($list->status == 1)
                                   <a href="{{url('admin/product/status/0')}}/{{$list->id}}">
                                    <button type="button" class="btn btn-primary">Active</button>    
                                   </a>
                                   @elseif($list->status == 0)
                                   <a href="{{url('admin/product/status/1')}}/{{$list->id}}">
                                    <button type="button" class="btn btn-warning">Deactive</button>    
                                   </a>
                                   @endif
                                   <a href="{{url('admin/product/delete')}}/{{$list->id}}">
                                    <button type="button" class="btn btn-danger">Delete</button>    
                                   </a>
                                    </td>
                 
                </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>


@endsection
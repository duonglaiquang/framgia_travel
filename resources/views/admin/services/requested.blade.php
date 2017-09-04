@extends('admin.layouts.master')

@section('contents')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b>Users List</b></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Province</th>
                            <th>Name</th>
                            <th>Request Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($RS as $service)
                            <tr>
                                <td>{{$service->id}}</td>
                                @foreach($categories as $category)
                                    @if($category->id == $service->category_id)
                                        <td>{{$category->name}}</td>
                                    @endif
                                @endforeach
                                @foreach($provinces as $province)
                                    @if($province->id == $service->province_id)
                                        <td>{{$province->name}}</td>
                                    @endif
                                @endforeach
                                <td>{{$service->name}}</td>
                                <td>{{$service->created_at}}</td>
                                @if($service->status == 0)
                                    <td><span class="label label-warning">Pending</span></td>
                                @elseif($service->status == 1)
                                    <td><span class="label label-success">Approved</span></td>
                                @elseif($service->status == 2)
                                    <td><span class="label label-danger">Canceled</span></td>
                                @endif
                                <td>
                                    <a href="{{route('approved',$service->id)}}">
                                        <button class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                                    </a>

                                    <a href="{{route('canceled',$service->id)}}">
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection

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
                            <th>User ID</th>
                            <th>Category ID</th>
                            <th>Province ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($RS as $service)
                            <tr>
                                <td>{{$service->id}}</td>
                                <td>{{$service->user_id}}</td>
                                <td>{{$service->category_id}}</td>
                                <td>{{$service->province_id}}</td>
                                <td>{{$service->name}}</td>
                                @if($service->status == 0)
                                    <td><span class="label label-warning">Pending</span></td>
                                @endif
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

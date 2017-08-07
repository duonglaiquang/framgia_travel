@extends('admin.layouts.master')

@section('contents')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
<<<<<<< HEAD:resources/views/admin/users/list.blade.php
                    <h3 class="box-title"><b>Users List</b></h3>
=======
                    <h3 class="box-title"><b>Users Table</b></h3>
>>>>>>> a196e498ffb3214db6c0d5d5c975020f3218073f:resources/views/admin/user_list.blade.php
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                @if($user->level == 0)
                                    <td><a href="{{ route('block', $user->id) }}"><i class="fa fa-fw fa-lock"></i></a>
                                    </td>
                                @else
                                    <td><b>Can't block</b></td>
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

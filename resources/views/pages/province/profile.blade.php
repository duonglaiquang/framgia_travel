@extends('layouts.master')

@section('style')
    {{ HTML::style('css/provincePF.css', ['rel' => 'stylesheet']) }}
    <style>
        body {
            background-image: url(../images/{{$provinces->bg_url}});
        }
    </style>
@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="container" id="content">
        <!-- Main content -->

    </div>
@endsection

@section('script')

@endsection
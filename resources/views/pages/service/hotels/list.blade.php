@extends('layouts.master')

@section('style')
    {{ HTML::style('css/provinceList.css') }}
@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="gallery text-center" id="wthree-gallery">
        <div class="container">
            <h3 class="agileits_head">Choose your place to go</h3>
            <span class="w3-line"></span>
            <div class="row">
                <form is="ajax-form" method="post" action="" id="search1">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input name="inputSearch" type="text" size="40" placeholder="Where to go..."/>
                </form>
            </div>
        </div>>
    </div>
@endsection
@section('script')
    {{ HTML::script('bower_components/ajax-form/ajax-form.js') }}
    {{ HTML::script('bower_components/jquery-form/dist/jquery.form.min.js') }}
@endsection

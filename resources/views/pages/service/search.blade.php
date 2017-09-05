@extends('layouts.master')

@section('style')
    {{ HTML::style('css/provinceList.css') }}
@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <?php
    switch ($type) {
        case 1:
            $service_name = 'hotels';
            break;

        case 2:
            $service_name = 'restaurants';
            break;

        case 3:
            $service_name = 'activities';
            break;
    }
    ?>
    <div class="wrapper">
        <div class="gallery text-center" id="wthree-gallery">
            <div class="container">
                <h3 class="agileits_head">{{$service_name}} In</h3>
                <span class="w3-line"></span>
                <div class="row">
                    <form is="ajax-form" method="post" action="" id="search1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input name="inputSearch" type="text" size="40" placeholder="Ha Noi, Da Nang, ..."/>
                    </form>
                </div>
                <div class="w3l_gallery_grids">
                    <div class="bs-example bs-example-tabs wthree_example_tab" role="tabpanel"
                         data-example-id="togglable-tabs">
                        <div class="w3l_gallery_grids1">
                            <?php
                            $i = 0;
                            ?>
                            @foreach($provinces as $province)
                                {{$i++}}
                                <div class="col-md-4 w3l_gallery_grid">
                                    <div class="agileinfo_gallery_grid">
                                        <a href={{ route($service_name, [$province->name,$type]) }}>
                                            <div class="hovereffect">
                                                <img src="{{url($province->img_url)}}" alt=" " class="img-responsive"/>
                                                <div class="overlay">
                                                    <p class="info">{{$province->name}}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            @if($i==0)
                                <h3>Nothing here</h3>
                                <h4>Search Again?</h4>
                            @endif
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{ HTML::script('bower_components/ajax-form/ajax-form.js') }}
    {{ HTML::script('bower_components/jquery-form/dist/jquery.form.min.js') }}
@endsection

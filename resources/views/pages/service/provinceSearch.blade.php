@extends('layouts.master')

@section('style')
    {{ HTML::style('css/provinceList.css') }}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                    <form method="post" action="{{route('serviceListSearch',$type)}}" id="search1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input name="inputSearch" id="tags" type="text" size="40" placeholder="Ha Noi, Da Nang, ..."/>
                    </form>
                </div>
                <div class="w3l_gallery_grids">
                    <div class="bs-example bs-example-tabs wthree_example_tab" role="tabpanel"
                         data-example-id="togglable-tabs">
                        <div class="w3l_gallery_grids1">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            var availableTags = [
                "Ha Noi",
                "Da Nang",
                "Nha Trang",
                "TP HCM",
                "Hue",
                "Da Lat",
                "Sapa",
                "Ha Long",
                "Phu Quoc"
            ];
            $("#tags").autocomplete({
                source: availableTags
            });
        });
    </script>
@endsection

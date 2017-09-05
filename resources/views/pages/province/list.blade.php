@extends('layouts.master')

@section('style')
    {{ HTML::style('css/provinceList.css') }}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="wrapper">
        <div class="gallery text-center" id="wthree-gallery">
            <div class="container">
                <h3 class="agileits_head">Choose your place to go</h3>
                <span class="w3-line"></span>
                <div class="row">
                    <form method="post" action="{{route('provinceSearch')}}" id="search1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input name="inputSearch" id="tags" type="text" size="40" placeholder="Where to go..."/>
                    </form>
                </div>
                <div class="w3l_gallery_grids">
                    <div class="bs-example bs-example-tabs wthree_example_tab" role="tabpanel"
                         data-example-id="togglable-tabs">
                        <div class="w3l_gallery_grids1">
                            @foreach($provinces as $province)
                                <div class="col-md-4 w3l_gallery_grid">
                                    <div class="agileinfo_gallery_grid">
                                        <a href={{ route('provincePF', $province->name) }}>
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

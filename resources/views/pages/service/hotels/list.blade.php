@extends('layouts.master')

@section('header')
    @include('includes.header')
@endsection

@section('style')
    {{  HTML::style('css/serviceList.css')  }}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
    <?php
    switch ($type) {
        case 1:
            $route_name = 'hotels';
            $route_namePF = 'hotelPF';
            $route_text = 'Hotels';
            $placeholder = 'Find Hotels';
            break;

        case 2:
            $route_name = 'restaurants';
            $route_namePF = 'restaurantPF';
            $route_text = 'Restaurants';
            $placeholder = 'Find Restaurants';
            break;

        case 3:
            $route_name = 'activities';
            $route_namePF = 'activityPF';
            $route_text = 'Activities';
            $placeholder = 'Find Activities';
            break;

        default:
            $route_name = '';
            $route_namePF = '';
            $route_text = '';
            $placeholder = '';
            break;
    }
    ?>

    <div id="wrapper">
        <div id="link">
            <div class="box1">
                <a href={{ route('provinceList') }}><h4>Province</h4></a>
            </div>
            <span class="fa  fa-chevron-right"></span>

            <div class="box1">
                <a href={{ route('provincePF', $provinces->name) }}><h4>{{ $provinces->name }}</h4></a>
            </div>
            <span class="fa  fa-chevron-right"></span>

            <div class="box1">
                <a href={{ route($route_name, [$provinces->name, $type]) }} class="dropdown-toggle"
                   data-toggle="dropdown">
                    <h4>{{ $route_text }}</h4>
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    @if($type == 1)
                        <li><a href="{{ route('restaurants',[$provinces->name, 2]) }}">Restaurants</a></li>
                        <li><a href="{{ route('activities',[$provinces->name, 3]) }}">Activities</a></li>

                    @elseif($type == 2)
                        <li><a href="{{ route('hotels',[$provinces->name, 1]) }}">Hotels</a></li>
                        <li><a href="{{ route('activities',[$provinces->name, 3]) }}">Activities</a></li>

                    @elseif($type == 3)
                        <li><a href="{{ route('restaurants',[$provinces->name, 2]) }}">Restaurants</a></li>
                        <li><a href="{{ route('hotels',[$provinces->name, 1]) }}">Hotels</a></li>

                    @endif
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="gallery text-center" id="wthree-gallery">
                <h3 class="agileits_head">{{ $provinces->name }} {{ $route_text }}</h3>

                <span class="w3-line"></span>
                <div class="row">
                    <form method="post" action="{{route('PFsearch', [$type, $provinces->id])}}" id="search1">
                        <input type="hidden" name="_token" value="{{  csrf_token()  }}">
                        <input type="hidden" id="type" value="{{ $type  }}">
                        <input type="hidden" id="province" value="{{ $provinces->id}}">
                        <input name="inputSearch" id="tags" type="text" size="40" placeholder="{{ $placeholder }}"/>
                    </form>
                </div>
            </div>


            <div class="service-content">
                @foreach($hotels as $hotel)
                    <div class='list-card'>
                        <img alt='' src={{ $hotel->profile_pic }}>
                        <div class='list-details'>
                            <div class='list-name'>
                                <a href="{{ route($route_namePF, [$provinces->name, $type, $hotel->name]) }}">
                                    <strong>{{ $hotel->name }}</strong>
                                </a>
                            </div>

                            <div class='list-location'>
                                <span class="fa fa-map-marker"></span>
                                {{ $hotel->address }}
                            </div>

                            @if($type == 1 || $type == 2)
                                <div class='list-location'>
                                    <span class="fa fa-phone"></span>
                                    {{ $hotel->phone }}
                                </div>
                            @endif

                            @if($type == 2 || $type == 3)
                                <div class='list-location'>
                                    <span class="fa  fa-clock-o"></span>
                                    {{ $hotel->open_time }}
                                </div>
                            @endif

                            <div class='list-price'>{{ $hotel->description }}</div>
                            <div class='list-bottom'>
                                <div class='list-bottom-section'>
                                    <span>{{ $hotel->expected_price }} $</span>
                                    <span>Avg Price</span>
                                </div>
                                <div class='list-bottom-section'>
                                    <span>{{ round($hotel->rate_average,2) }} /5</span>
                                    <span>Rating</span>
                                </div>
                                <div class='list-bottom-section'>
                                    <span>{{ $hotel->comment }}</span>
                                    <span>Comment</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            type = $('#type').val();
            province = $('#province').val();
            $("#tags").autocomplete({
                source: 'http://localhost:8000/search' + type + province
            })
            ;
        });
    </script>
@endsection

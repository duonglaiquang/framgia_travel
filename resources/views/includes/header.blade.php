<!-- header -->
<header id="stickyribbon">
    <div class="container">
        <!-- navigation -->
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="w3-logo">
                    <img src="{{ asset('images/framgia_logo.png') }}"/>
                    <h1><a href={{route('home')}}>Framgia Trip</a></h1>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a class="active" href="http://localhost:8000/home">{{ trans('label.home') }}</a></li>
                    <li><a href="{{ route('provinceList') }}">Provinces</a></li>
                    <li><a href="{{ route('serviceList',1) }}">Hotels</a></li>
                    <li><a href="{{ route('serviceList',2) }}">Restaurants</a></li>
                    <li><a href="{{ route('serviceList',3) }}">Activities</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="nav-mini-wrapper">
        <ul class="nav-login">
            @if (Auth::guest())
                <li id="register">
                    <a href="{{ route('register') }}">
                        <img src="{{ asset('/images/register.png') }}"/>
                    </a>
                </li>
                <li id="login">
                    <a href="{{ route('login') }}">
                        <img src="{{ asset('/images/login.png') }}">
                    </a>
                </li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::user() -> level == 1)
                            <li><a href="{{ route('admin') }}"><strong>ADMIN</strong></a></li>
                        @endif
                        <li><a href="{{ route('user.profile', [Auth::user()->id]) }}">{{ trans('label.profile') }}</a>
                        </li>
                        <li><a href="{{ route('service.request', [Auth::user()->id]) }}">Request Service</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('requestGet') }}">Add Plan</a></li>
                        <li>
                            <a href="javascript:void(0)" id="logout-1">
                                {{trans('label.logout')}}
                            </a>
                            {!! Form::open(['role'=>'form', 'route'=> 'logout', 'method'=>'POST', 'id'=>'logout-form']) !!}
                            {{ csrf_field() }}
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
    <div class="clearfix"></div>
    <!-- //navigation -->
    @yield('search')
</header>


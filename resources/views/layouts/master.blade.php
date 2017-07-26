<!DOCTYPE html>
<html lang="en">
<head>
    <title>Framgia Trip</title>
    {{ HTML::style('bower_components/font-awesome/css/font-awesome.min.css', array('rel' => 'stylesheet', 'type' => 'text/css' )) }}
    {{ HTML::style('bower_components/bootstrap/dist/css/bootstrap.css', array('rel' => 'stylesheet', 'type' => 'text/css' )) }}
    {{ HTML::style('css/style.css', array('rel' => 'stylesheet', 'type' => 'text/css' )) }}
    <!-- meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Road trip Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //meta tags -->
    <!--fonts-->
    {{ HTML::style('//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=latin-ext', array('rel' => 'stylesheet')) }}
    {{ HTML::style('//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese', array('rel' => 'stylesheet')) }}
    <!--//fonts-->
    {{ HTML::style('bower_components/FourBoxes/css/component.css', array('rel' => 'stylesheet', 'type' => 'text/css' )) }}
    {{ HTML::style('css/colorbox.css', array('rel' => 'stylesheet')) }}
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<!-- slider -->
<div class="w3-slider">
    <div id="boxgallery" class="boxgallery" data-effect="effect-1">
        <div class="panel"><img src="images/4.jpg" alt="Image 1"/></div>
        <div class="panel"><img src="images/2.jpg" alt="Image 2"/></div>
        <div class="panel"><img src="images/3.jpg" alt="Image 3"/></div>
        <div class="panel"><img src="images/1.jpg" alt="Image 4"/></div>
    </div>
    <div class="w3layouts-header-title">
        <h2>We always be there for you wherever you go</h2>
    </div>
</div><!-- /container -->
<!-- header -->
<header id="stickyribbon">
    <div class="container">
        <!-- navigation -->
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="w3-logo">
                    <img src="/images/framgia_logo.png" style="height: 50px; width: 50px">
                    <h1 style="float: right"><a href="#">Framgia Trip</a></h1>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a class="active" href="/home">Home</a></li>
                    <li><a class="scroll" href="#w3-agile-about">About</a></li>
                    <li><a class="scroll" href="#agileits-specials">Specials</a></li>
                    <li><a class="scroll" href="#wthree-gallery">Gallery</a></li>
                    <li><a class="scroll" href="#agileinfo-news">News</a></li>
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a class="scroll" href="#w3layouts-team">Team</a></li>--}}
                            {{--<li><a class="scroll" href="#w3ls-testimonials">Testimonials</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <li><a class="scroll" href="#w3-contact">Contact</a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        <div class="clearfix"></div>
        <!-- //navigation -->
    </div>
</header>
<!-- //header -->
@yield('content')

<!-- footer-section -->
<footer>
    <div class="container">
        <div class="w3ls-icons">
            <a href="https://www.facebook.com/" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="https://twitter.com/" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://plus.google.com/" title="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
            <a href="https://www.linkedin.com/" title="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        </div>
        <div class="copyright">
            <p>&copy; 2017 Framgia trip. All Rights Reserved | Design by <a href="http://google.com/"> WEABOO</a></p>
        </div>
        <div class="clearfix"></div>
    </div>
</footer>
<!-- footer-section -->
{{ HTML::script('bower_components/jquery/dist/jquery.min.js', array('type' => 'text/javascript')) }}
{{ HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
{{ HTML::script('bower_components/FourBoxes/js/modernizr.custom.js') }}
<!-- js required for banner slider -->
{{ HTML::script('bower_components/FourBoxes/js/classie.js') }}
{{ HTML::script('bower_components/FourBoxes/js/boxesFx.js') }}
<!-- //js required for banner slider -->
<script>
    new BoxesFx( document.getElementById( 'boxgallery' ) );
</script>
<!-- //slider -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- start-smoth-scrolling -->
{{ HTML::script('js/move-top.js', array('type' => 'text/javascript')) }}
{{ HTML::script('js/easing.js', array('type' => 'text/javascript')) }}
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
<!-- //here ends scrolling icon -->
<script type="text/javascript">
    $(function(){
        var stickyRibbonTop = $('#stickyribbon').offset().top;

        $(window).scroll(function(){
            if( $(window).scrollTop() > stickyRibbonTop ) {
                $('#stickyribbon').css({position: 'fixed', top: '0px'});
            } else {
                $('#stickyribbon').css({position: 'static', top: '0px'});
            }
        });
    });
</script>
</body>
</html>
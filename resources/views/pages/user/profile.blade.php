<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Framgia Trip</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{ HTML::style('bower_components/bootstrap/dist/css/bootstrap.css') }}
    {{ HTML::style('bower_components/font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('bower_components/Ionicons/css/ionicons.min.css') }}
    {{ HTML::style('bower_components/AdminLTE/dist/css/AdminLTE.min.css') }}
    {{ HTML::style('bower_components/AdminLTE/dist/css/skins/_all-skins.min.css') }}
    {{ HTML::style('bower_components/AdminLTE/plugins/iCheck/flat/blue.css') }}
    {{ HTML::style('bower_components/AdminLTE/plugins/morris/morris.css') }}
    {{ HTML::style('bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}
    {{ HTML::style('bower_components/AdminLTE/plugins/datepicker/datepicker3.css') }}
    {{ HTML::style('bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.css') }}
    {{ HTML::style('bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}
    {{ HTML::style('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}
    {{ HTML::style('css/gallery.css') }}
</head>
<body class="hold-transition skin-blue sidebar-mini">
<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <img src="{{ asset('images/framgia_logo.png') }}"
                 style="height: 50px; width: 50px; float: left; margin-top: 3px "/>
            <h3 style="float: left"><a href="{{ asset('home') }}">Framgia Trip</a></h3>
            <ul style="float: right; margin-top: 25px;">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        </div>
    </nav>
</header>
<div class="container">
    <section class="content-header">
        <h1>
            User Profile
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset('bower_components/AdminLTE/dist/img/user3-128x128.jpg') }}"
                             alt="User profile picture">

                        <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                        <p class="text-muted text-center">Tourist</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="pull-right">{{Auth::user()->follower}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="pull-right">{{Auth::user()->following}}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong>Biography</strong>
                        <p class="text-muted">
                            {{Auth::user()->self_describe}}
                        </p>
                        <hr>

                        <strong>Email</strong>
                        <p class="text-muted">
                            {{Auth::user()->email}}
                        </p>
                        <hr>

                        <strong>Birthday</strong>
                        <p class="text-muted">{{Auth::user()->date_of_birth}}</p>
                        <hr>

                        <strong>Gender</strong>
                        <p class="text-muted">{{Auth::user()->gender}}</p>
                        <hr>

                        <strong>Phone</strong>
                        <p class="text-muted">{{Auth::user()->phone}}</p>
                        <hr>

                        <strong>Address</strong>
                        <p class="text-muted">{{Auth::user()->address}}</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Blog</a></li>
                        <li><a href="#gallery" data-toggle="tab">Gallery</a></li>
                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            {{--<!-- Post -->--}}
                            {{--<div class="post">--}}
                            {{--<div class="user-block">--}}
                            {{--<img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">--}}
                            {{--<span class="username">--}}
                            {{--<a href="#">Jonathan Burke Jr.</a>--}}
                            {{--<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>--}}
                            {{--</span>--}}
                            {{--<span class="description">Shared publicly - 7:30 PM today</span>--}}
                            {{--</div>--}}
                            {{--<!-- /.user-block -->--}}
                            {{--<p>--}}
                            {{--Lorem ipsum represents a long-held tradition for designers,--}}
                            {{--typographers and the like. Some people hate it and argue for--}}
                            {{--its demise, but others ignore the hate as they create awesome--}}
                            {{--tools to help create filler text for everyone from bacon lovers--}}
                            {{--to Charlie Sheen fans.--}}
                            {{--</p>--}}
                            {{--<ul class="list-inline">--}}
                            {{--<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>--}}
                            {{--<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>--}}
                            {{--</li>--}}
                            {{--<li class="pull-right">--}}
                            {{--<a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments--}}
                            {{--(5)</a></li>--}}
                            {{--</ul>--}}

                            {{--<input class="form-control input-sm" type="text" placeholder="Type a comment">--}}
                            {{--</div>--}}
                            {{--<!-- /.post -->--}}

                            {{--<!-- Post -->--}}
                            {{--<div class="post clearfix">--}}
                            {{--<div class="user-block">--}}
                            {{--<img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">--}}
                            {{--<span class="username">--}}
                            {{--<a href="#">Sarah Ross</a>--}}
                            {{--<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>--}}
                            {{--</span>--}}
                            {{--<span class="description">Sent you a message - 3 days ago</span>--}}
                            {{--</div>--}}
                            {{--<!-- /.user-block -->--}}
                            {{--<p>--}}
                            {{--Lorem ipsum represents a long-held tradition for designers,--}}
                            {{--typographers and the like. Some people hate it and argue for--}}
                            {{--its demise, but others ignore the hate as they create awesome--}}
                            {{--tools to help create filler text for everyone from bacon lovers--}}
                            {{--to Charlie Sheen fans.--}}
                            {{--</p>--}}

                            {{--<form class="form-horizontal">--}}
                            {{--<div class="form-group margin-bottom-none">--}}
                            {{--<div class="col-sm-9">--}}
                            {{--<input class="form-control input-sm" placeholder="Response">--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-3">--}}
                            {{--<button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</form>--}}
                            {{--</div>--}}
                            {{--<!-- /.post -->--}}

                            {{--<!-- Post -->--}}
                            {{--<div class="post">--}}
                            {{--<div class="user-block">--}}
                            {{--<img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">--}}
                            {{--<span class="username">--}}
                            {{--<a href="#">Adam Jones</a>--}}
                            {{--<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>--}}
                            {{--</span>--}}
                            {{--<span class="description">Posted 5 photos - 5 days ago</span>--}}
                            {{--</div>--}}
                            {{--<!-- /.user-block -->--}}
                            {{--<div class="row margin-bottom">--}}
                            {{--<div class="col-sm-6">--}}
                            {{--<img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">--}}
                            {{--</div>--}}
                            {{--<!-- /.col -->--}}
                            {{--<div class="col-sm-6">--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-sm-6">--}}
                            {{--<img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">--}}
                            {{--<br>--}}
                            {{--<img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">--}}
                            {{--</div>--}}
                            {{--<!-- /.col -->--}}
                            {{--<div class="col-sm-6">--}}
                            {{--<img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">--}}
                            {{--<br>--}}
                            {{--<img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">--}}
                            {{--</div>--}}
                            {{--<!-- /.col -->--}}
                            {{--</div>--}}
                            {{--<!-- /.row -->--}}
                            {{--</div>--}}
                            {{--<!-- /.col -->--}}
                            {{--</div>--}}
                            {{--<!-- /.row -->--}}

                            {{--<ul class="list-inline">--}}
                            {{--<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>--}}
                            {{--<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>--}}
                            {{--</li>--}}
                            {{--<li class="pull-right">--}}
                            {{--<a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments--}}
                            {{--(5)</a></li>--}}
                            {{--</ul>--}}

                            {{--<input class="form-control input-sm" type="text" placeholder="Type a comment">--}}
                            {{--</div>--}}
                            {{--<!-- /.post -->--}}
                        </div>
                        <div class="tab-pane" id="gallery">
                            <div class="container">
                                <div class="row">
                                    <div class="gallery">
                                        <figure>
                                            <img src="http://lorempixel.com/500/500/nature" class="resize"/>
                                            <figcaption>Daytona Beach <small>United States</small></figcaption>
                                        </figure>
                                        <figure>
                                            <img src="http://lorempixel.com/500/500/nature" class="resize"/>
                                            <figcaption>Териберка, gorod Severomorsk <small>Russia</small></figcaption>
                                        </figure>
                                        <figure>
                                            <img src="http://lorempixel.com/500/500/nature" class="resize"/>
                                            <figcaption>
                                                Bad Pyrmont <small>Deutschland</small>
                                            </figcaption>
                                        </figure>
                                        <figure>
                                            <img src="http://lorempixel.com/500/500/nature" class="resize"/>
                                            <figcaption>Yellowstone National Park <small>United States</small></figcaption>
                                        </figure>
                                        <figure>
                                            <img src="http://lorempixel.com/500/500/nature" class="resize"/>
                                            <figcaption>Quiraing, Portree <small>United Kingdom</small></figcaption>
                                        </figure>
                                        <figure>
                                            <img src="http://lorempixel.com/500/500/nature" class="resize"/>
                                            <figcaption>Highlands <small>United States</small></figcaption>
                                        </figure>
                                        <figure>
                                            <img src="http://lorempixel.com/500/500/nature" class="resize"/>
                                            <figcaption>Daytona Beach <small>United States</small></figcaption>
                                        </figure>
                                        <figure>
                                            <img src="http://lorempixel.com/500/500/nature" class="resize"/>
                                            <figcaption>Териберка, gorod Severomorsk <small>Russia</small></figcaption>
                                        </figure>
                                        <figure>
                                            <img src="http://lorempixel.com/500/500/nature" class="resize"/>
                                            <figcaption>
                                                Bad Pyrmont <small>Deutschland</small>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
                                        <symbol id="close" viewBox="0 0 18 18">
                                            <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9,0.493C4.302,0.493,0.493,4.302,0.493,9S4.302,17.507,9,17.507
			S17.507,13.698,17.507,9S13.698,0.493,9,0.493z M12.491,11.491c0.292,0.296,0.292,0.773,0,1.068c-0.293,0.295-0.767,0.295-1.059,0
			l-2.435-2.457L6.564,12.56c-0.292,0.295-0.766,0.295-1.058,0c-0.292-0.295-0.292-0.772,0-1.068L7.94,9.035L5.435,6.507
			c-0.292-0.295-0.292-0.773,0-1.068c0.293-0.295,0.766-0.295,1.059,0l2.504,2.528l2.505-2.528c0.292-0.295,0.767-0.295,1.059,0
			s0.292,0.773,0,1.068l-2.505,2.528L12.491,11.491z"/>
                                        </symbol>
                                    </svg>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" method="POST" action="user.profile">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inputName"
                                               value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="inputEmail"
                                               value="{{Auth::user()->email}}" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('Gender') }}</label>
                                    <div class="col-sm-10">
                                        <div class="col-sm-2">
                                            <input type="radio" name="gender" value="Male"
                                                   id="male" {{ Auth::user()->gender == 'Male' ? 'checked' : '' }}> Male<br>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" name="gender" value="Female"
                                                   id="female" {{ Auth::user()->gender == 'Female' ? 'checked' : '' }}>
                                            Female<br>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" name="gender" value="Other"
                                                   id="other" {{ Auth::user()->gender == 'Other' ? 'checked' : '' }}>
                                            Other<br>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDob" class="col-sm-2 control-label">Birthday</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="pickyDate" class="form-control" name="inputDob" value="{{ Auth::user()->date_of_birth }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-sm-2 control-label">Address</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inputAddress"
                                               value="{{Auth::user()->address}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inputPhone"
                                               value="{{Auth::user()->phone}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputBio" class="col-sm-2 control-label">Biography</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="inputBio">{{Auth::user()->self_describe}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"
                                                       onchange="document.getElementById('btnt').disabled = !this.checked"/>
                                                I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" name="btn" id="btnt" value="Submit" class="btn btn-danger"
                                               disabled/>
                                    </div>
                                </div>
                            </form>
                        </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <br><br><br>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2016-2017 <a href="http://localhost:8000/home">Framgia Trip</a>.</strong> All rights
        reserved.
    </footer>
</div>


{{ HTML::script('bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}
{{ HTML::script('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('bower_components/AdminLTE/plugins/sparkline/jquery.sparkline.min.js') }}
{{ HTML::script('bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}
{{ HTML::script('bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}
{{ HTML::script('bower_components/AdminLTE/plugins/knob/jquery.knob.js') }}
{{ HTML::script('bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js') }}
{{ HTML::script('bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
{{ HTML::script('bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}
{{ HTML::script('bower_components/AdminLTE/plugins/fastclick/fastclick.js') }}
{{ HTML::script('bower_components/AdminLTE/dist/js/app.min.js') }}
{{ HTML::script('bower_components/AdminLTE/dist/js/demo.js') }}
{{ HTML::script('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
<script type="text/javascript">
    $(document).ready(function () {
        $('#pickyDate').datepicker({
            format: "dd/mm/yyyy"
        });
    });
</script>
<script>
    popup = {
        init: function () {
            $('figure').click(function () {
                popup.open($(this));
            });

            $(document).on('click', '.popup img', function () {
                return false;
            }).on('click', '.popup', function () {
                popup.close();
            })
        },
        open: function ($figure) {
            $('.gallery').addClass('pop');
            $popup = $('<div class="popup" />').appendTo($('body'));
            $fig = $figure.clone().appendTo($('.popup'));
            $bg = $('<div class="bg" />').appendTo($('.popup'));
            $close = $('<div class="close"><svg><use xlink:href="#close"></use></svg></div>').appendTo($fig);
            $shadow = $('<div class="shadow" />').appendTo($fig);
            src = $('img', $fig).attr('src');
            $shadow.css({backgroundImage: 'url(' + src + ')'});
            $bg.css({backgroundImage: 'url(' + src + ')'});
            setTimeout(function () {
                $('.popup').addClass('pop');
            }, 10);
        },
        close: function () {
            $('.gallery, .popup').removeClass('pop');
            setTimeout(function () {
                $('.popup').remove()
            }, 100);
        }
    }
    popup.init()
</script>
</body>
</html>
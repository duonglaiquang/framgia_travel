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
</head>
<body class="hold-transition skin-blue sidebar-mini">
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
                        @if(Auth::user()->profile_pic == null)
                            <img class="profile-user-img img-responsive img-circle"
                                 src="{{asset('images/user-pic.png')}}"
                                 alt="">
                        @else
                            <img class="profile-user-img img-responsive img-circle" src="{{Auth::user()->profile_pic}}"
                                 alt="">
                        @endif
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
                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" method="POST"
                                  action="{{ route('user.update',Auth::user()->id) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inputName"
                                               placeholder="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="inputEmail"
                                               placeholder="{{Auth::user()->email}}" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDob" class="col-sm-2 control-label">Birthday</label>

                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="inputDob">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('Gender') }}</label>
                                    <div class="col-sm-10">
                                        <div class="col-sm-2">
                                            <input type="radio" name="gender" value="male" id="male"> Male<br>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" name="gender" value="female" id="female"> Female<br>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" name="gender" value="other" id="other"> Other<br>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-sm-2 control-label">Address</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inputAddress"
                                               placeholder="{{Auth::user()->address}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="inputPhone"
                                               placeholder="{{Auth::user()->phone}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputBio" class="col-sm-2 control-label">Biography</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="inputBio"
                                                  placeholder="{{Auth::user()->self_describe}}"></textarea>
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
                        <!-- /.tab-pane  -->
                    </div>
                    <!-- /.tab-content -->
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
</body>
</html>
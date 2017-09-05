<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ asset('home') }}" class="logo"><b>Framgia</b>Trip</a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- Tasks Menu -->

            <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}"
                             class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}"
                                 class="img-circle" alt="User Image"/>
                            <p>
                                {{ Auth::user()->name }}
                                <small>ADMIN</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="http://localhost:8000/user/profile/{{Auth::user()->id}}"
                                   class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="javascript:void(0)" id="logout-1" class="btn btn-default btn-flat">
                                    {{trans('label.logout')}}
                                </a>
                                {!! Form::open(['role'=>'form','route'=> 'logout','method'=>'POST','id'=>'logout-form']) !!}
                                {{ csrf_field() }}
                                {!! Form::close() !!}
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

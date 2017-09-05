<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class="fa fa-circle-o fa-pull-left"></i><span>Users</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('userList') }}"><i class="fa fa-user fa-pull-left"></i>Show Users</a></li>
                    <li><a href="{{ route('userBlock') }}"><i class="fa fa-user-times fa-pull-left"></i>Blocked
                            Users</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-circle-o fa-pull-left"></i><span>Provinces</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('provinceShowList') }}"><i class="fa fa-list fa-pull-left"></i>Show Provinces</a>
                    </li>
                    <li><a href="{{ route('provinceGetAdd') }}"><i class="fa fa-plus-square fa-pull-left"></i>Add
                            Province</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-circle-o fa-pull-left"></i><span>Services</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('provinceShowList') }}"><i class="fa fa-list fa-pull-left"></i>Show Services</a>
                    </li>
                    <li><a href="{{ route('serviceRequested') }}"><i class="fa fa-plus-square fa-pull-left"></i>Requested Services</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

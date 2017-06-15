<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                        <span class="clear">
                            <span class="block m-t-xs">
				<img src="/images/nsc_logo_t.png" height="64" width="64"><br><br>
                                <strong class="font-bold" color="white">Michael Fraser</strong>
                            </span> 
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ url('logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <img src="/images/nsc_logo.png" height="64" width="64"> 
                </div>
            </li>
            <li class="active">
                <a href="{{ url('/reports') }}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports</span> </a>
                <!--
                    <ul class="nav nav-second-level collapse in">
                    <li class="active">
                            <a href="#">Saved Reports <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse in">
                                <li>
                                    <a href="#">Saved Report 1</a>
                                </li>
                                <li>
                                    <a href="#">Saved Report 2</a>
                                </li>
                                <li>
                                    <a href="#">All</a>
                                </li>
                            </ul>
                        </li>
                    </li>
                </ul>
                -->
            </li>
            <li class="{{ isActiveRoute('admin/show') }}">
                <a href="{{ url('/admin/show') }}"><i class="fa fa-th"></i> <span class="nav-label">Admin Management</span></a>
            </li>
            <li class="{{ isActiveRoute('tip/edit') }}">
                <a href="{{ url('/tip/edit') }}"><i class="fa fa-table"></i> <span class="nav-label">TIPS Management</span> </a>
            </li>
            
        </ul>
    </div>
    
</nav>


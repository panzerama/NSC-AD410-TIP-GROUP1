<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                        <span class="clear">
                            <span class="block m-t-xs">
                                
                                <strong class="font-bold">User Name</strong>
                            </span> 
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <h3>LOGO</h3>
                </div>
            </li>
            <li class="{{ isActiveRoute('admin-management') }}">
                <a href="{{ url('/admin-management') }}"><i class="fa fa-th"></i> <span class="nav-label">Admin Management</span></a>
            </li>
            <li class="{{ isActiveRoute('tips-management') }}">
                <a href="{{ url('/tips-management') }}"><i class="fa fa-table"></i> <span class="nav-label">TIPS Management</span> </a>
            </li>
            <li class="{{ isActiveRoute('reports') }}">
                <a href="{{ url('/reports') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Reports</span> </a>
            </li>
            <li class="{{ isActiveRoute('inactivate-user') }}">
                <a href="{{ url('/inactivate-user') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Inactivate User</span> </a>
            </li>
        </ul>

    </div>
</nav>

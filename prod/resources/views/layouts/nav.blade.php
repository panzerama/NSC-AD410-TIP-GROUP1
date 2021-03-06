<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                        <span class="clear text-center">
                            <span class="block m-t-xs">
                               <img src="/images/nsc_logo_t.png" height="96" width="96">
                            </span> 
                            <strong class="font-bold">
                            @if( Auth::check() )
                            {{ Auth::user()->name }}
                            @else Unauthenticated User
                            @endif
			                </strong>
                        </span>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ url('logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                     <img src="/images/nsc_logo.png" height="64" width="64">
                </div>
            </li>
            <li class="{{ isActiveRoute('tip') }} {{ isActiveRoute('tip/questions') }}">
                <a href="{{ url('/tip') }}"><i class="fa fa-th"></i> <span class="nav-label">TIPS</span></a>
            </li>
            <li class="{{ isActiveRoute('tip/previous') }}">
                <a href="{{ url('/tip/previous') }}"><i class="fa fa-table"></i> <span class="nav-label">View Previous TIPS</span> </a>
            </li>
            <li class="{{ isActiveRoute('contact') }}">
                <a href="{{ url('/contact') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Contact Admin</span> </a>
            </li>
        </ul>
    </div>
</nav>

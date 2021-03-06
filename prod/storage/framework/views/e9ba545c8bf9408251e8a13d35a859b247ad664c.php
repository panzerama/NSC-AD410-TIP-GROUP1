<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <img src="/images/nsc_logo_t.png" height="64" width="64"><br><br>
                                <strong class="font-bold">Michael Fraser</strong>
                            </span> 
                        </span>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?php echo e(url('logout')); ?>">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                     <img src="/images/nsc_logo.png" height="64" width="64">
                </div>
            </li>
            <li class="<?php echo e(isActiveRoute('reports')); ?>">
                <a href="<?php echo e(url('/reports')); ?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports</span> </a>
            </li>
            <li class="<?php echo e(isActiveRoute('admin/show')); ?>">
                <a href="<?php echo e(url('/admin/show')); ?>"><i class="fa fa-th"></i> <span class="nav-label">Admin Management</span></a>
            </li>
            <li class="<?php echo e(isActiveRoute('tip/edit')); ?>">
                <a href="<?php echo e(url('/tip/edit')); ?>"><i class="fa fa-table"></i> <span class="nav-label">TIPS Management</span> </a>
            </li>
        </ul>
    </div>
</nav>


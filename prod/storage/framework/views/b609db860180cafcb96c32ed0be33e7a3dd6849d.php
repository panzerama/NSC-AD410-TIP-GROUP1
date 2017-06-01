<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <img src="/images/nsc_logo_t.png" height="64" width="64">&nbsp;&nbsp;&nbsp;
				                <strong class="font-bold">Michael Fraser</strong>
                            </span> 
                        </span>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                     <img src="/images/nsc_logo.png" height="64" width="64">
                </div>
            </li>
            <li class="<?php echo e(isActiveRoute('tip')); ?> <?php echo e(isActiveRoute('tip/questions')); ?>">
                <a href="<?php echo e(url('/tip')); ?>"><i class="fa fa-th"></i> <span class="nav-label">TIPS</span></a>
            </li>
            <li class="<?php echo e(isActiveRoute('tip/previous')); ?>">
                <a href="<?php echo e(url('/tip/previous')); ?>"><i class="fa fa-table"></i> <span class="nav-label">View Previous TIPS</span> </a>
            </li>
            <li class="<?php echo e(isActiveRoute('contact')); ?>">
                <a href="<?php echo e(url('/contact')); ?>"><i class="fa fa-envelope"></i> <span class="nav-label">Contact Admin</span> </a>
            </li>
        </ul>
    </div>
</nav>

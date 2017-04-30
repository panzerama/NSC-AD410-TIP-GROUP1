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
            <li class="<?php echo e(isActiveRoute('tip')); ?> <?php echo e(isActiveRoute('tip-questions')); ?>">
                <a href="<?php echo e(url('/tip')); ?>"><i class="fa fa-th"></i> <span class="nav-label">TIPS</span></a>
            </li>
            <li class="<?php echo e(isActiveRoute('view-previous-tips')); ?> <?php echo e(isActiveRoute('previous-tip')); ?>">
                <a href="<?php echo e(url('/view-previous-tips')); ?>"><i class="fa fa-table"></i> <span class="nav-label">View Previous TIPS</span> </a>
            </li>
            <li class="<?php echo e(isActiveRoute('contact-admin')); ?>">
                <a href="<?php echo e(url('/contact-admin')); ?>"><i class="fa fa-envelope"></i> <span class="nav-label">Contact Admin</span> </a>
            </li>
        </ul>

    </div>
</nav>
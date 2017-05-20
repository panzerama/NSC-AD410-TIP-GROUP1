<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?> </title>


    <link rel="stylesheet" href="<?php echo asset('css/vendor.css', true); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/app.css', true); ?>" />
    <link rel="stylesheet" href="<?php echo asset('css/custom.css', true); ?>" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>

</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        <?php echo $__env->make('layouts.nav-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            <?php echo $__env->make('layouts.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- Main view  -->
            <?php echo $__env->yieldContent('content'); ?>

            <!-- Footer -->
            <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="<?php echo asset('js/app.js', true); ?>" type="text/javascript"></script>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->yieldSection(); ?>

</body>
</html>

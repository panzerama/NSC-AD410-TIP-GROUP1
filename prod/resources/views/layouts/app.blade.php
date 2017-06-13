<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') </title>

    
    <link rel="stylesheet" href="{!! asset('css/vendor.css', true) !!}" type="text/css" />
    <link rel="stylesheet" href="{!! asset('css/app.css', true) !!}" type="text/css" />
    <link rel="stylesheet" href="{!! asset('css/custom.css', true) !!}" type="text/css" />
    <!--For index page for autocomplete styling-->
    <!--<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.css">-->

    
</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.nav')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('layouts.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="{!! asset('js/app.js', true) !!}" type="text/javascript"></script>


@section('scripts')
@show

</body>
</html>

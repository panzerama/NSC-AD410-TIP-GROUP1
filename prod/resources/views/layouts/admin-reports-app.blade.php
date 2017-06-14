<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') </title>


    <link rel="stylesheet" href="{!! asset('css/vendor.css', true) !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css', true) !!}" />
    <link rel="stylesheet" href="{!! asset('css/reports.css', true) !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    
    @yield('page-style-files')
    
</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.nav-admin')

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

@yield('page-js-files')
@yield('page-js-script')
  
</html>
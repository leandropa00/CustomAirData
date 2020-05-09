@include('layouts.includes.header')

@yield('css')
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <!-- BEGIN: Header-->
         @yield('content')
    <!-- BEGIN: Vendor JS-->
 @yield('js')
@include('layouts.includes.header')

<!-- END: Head-->

<!-- BEGIN: Body-->
@yield('css')
<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">
    <!-- BEGIN: Header-->
    @include('layouts.includes.nav')
    @include('layouts.includes.sidebar')

         @yield('content')
    <!-- BEGIN: Vendor JS-->

@include('layouts.includes.footer')

@yield('js')

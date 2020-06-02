<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Employee | Management</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom_design.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}"/>
    <link rel="shortcut icon" href="{{asset('assets/images/logo/setcol-logo2.png')}}" />
{{--    <link rel="stylesheet" href="{{asset('css/StyleCalender.css')}}">--}}
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<body>
<div class="container-scroller">
@include('admin.include.header')
    <div class="container-fluid page-body-wrapper">
    @include('admin.include.side_bar')
        <div class="main-panel">
            <div class="text-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            @yield('content')
            <footer class="footer">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span class="text-muted text-center d-block d-sm-inline-block">Copyright © 2020 <a href="#" target="_blank">DEMO EMS</a>. All rights reserved.</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
<script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script src="{{asset('assets/js/todolist.js')}}"></script>
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/js/file-upload.js')}}"></script>
<script>
    toastr.options = {
        "debug": false,
        "positionClass": "toast-top-left",
        "onclick": null,
        "fadeIn": 300,
        "fadeOut": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000
    };
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
    @endif
    @if(Session::has('error'))
    toastr.error("{{Session::get('error')}}");
    @endif
</script>
</body>
</html>

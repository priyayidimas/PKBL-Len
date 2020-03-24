<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#0039e6">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#0039e6">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#0039e6">
    <title>Portal PKBL PT Len Industri</title>
    <link rel="icon" href="{{url('/assets/img/len.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{url('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/compiled.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/divider.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/style.css')}}" rel="stylesheet">
    <script src="{{url('/assets/js/jquery.min.js')}}"></script>
    @yield('head')
</head>
<body class="grey lighten-3  scrollbar scrollbar-morpheus-den" id="home">
  @yield('content')
</body>
  <script type="text/javascript" src="{{url('/assets/js/popper.min.js')}}"></script>
  <script type="text/javascript" src="{{url('/assets/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{url('/assets/js/mdb.minc.js')}}"></script>
  <script>
  $(document).ready(function () {
    new WOW().init();    
    // SideNav Button Initialization
    $("#nav-icon").sideNav("show");

    // $('.button-collapse').sideNav('hide');
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    Ps.initialize(sideNavScrollbar);
  });
  </script>
  @yield('script')
</html>

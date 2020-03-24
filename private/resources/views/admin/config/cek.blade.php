@extends('t_index')
@section('head')

@endsection
@section('content')
<!--Navbar-->
{{-- <nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <strong>Navbar</strong>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav1">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Pricing</a>
                </li>
                <li class="nav-item dropdown btn-group">
                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
                       
                        <div class="container">
             
                            <div class="row">

                                <div class="col-md-2 offset-md-1">
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                </div>

                                <div class="col-md-2">
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                </div>

                                <div class="col-md-2">
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                </div>

                                <div class="col-md-2">
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                </div>

                                <div class="col-md-2">
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                    <a class="dropdown-item" href="#">Link</a>
                                </div>

                            </div>

                        </div>
                        
                    </div>
                </li>
            </ul>
            <form class="form-inline waves-effect waves-light">
                <input class="form-control" type="text" placeholder="Search">
            </form>
        </div>
    </div>
</nav> --}}
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">
      <a class="navbar-brand" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">
        <strong><img src="{{url('/assets/img/Logo Len.svg')}}" alt="" srcset="" style="height:50px"> PKBL Len</strong>
      </a>
      <button class="navbar-toggler button-collapse" type="button" data-activates="slide-out" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/about')}}">About</a>
          </li>
          <li class="nav-item ">
            {{-- <a class="nav-link" href="{{url('/product')}}">Category</a> --}}
            <div class="dropdown ">
                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                {{-- <div class="dropdown-menu dropdown-primary">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Something else here</a>

                </div> --}}
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu3" style="width: 40vw">
                    <div class="row">
                        <ul class="list-unstyled col-md-6">
                            <li><a class="dropdown-item" href="#">Cara Peminjaman Uang PKBL PT Len</a></li>
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Action</a></li>
                        </ul>
                        <ul class="list-unstyled col-md-6">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Action</a></li>
                        </ul>
                    </div> 
                </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/blog')}}">Blog</a>
          </li>
        </ul>
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="{{url('/login')}}" class="nav-link border border-light rounded" target="_blank">
              <i class="fa fa-sign-in mr-2"></i>Login
            </a>
          </li>
        </ul>
      </div>
    </div>
</nav>
<!-- SideNav slide-out button -->

<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav fixed">
  <ul class="custom-scrollbar">
      <!-- Logo -->
      <li>
          <div class="logo-wrapper waves-light">
              <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
          </div>
      </li>
      <!--/. Logo -->
      <!--Social-->
      <li>
          <ul class="social">
              <li><a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
              <li><a href="#" class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
              <li><a href="#" class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
              <li><a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
          </ul>
      </li>
      <!--/Social-->
      <!--Search Form-->
      <li>
          <form class="search-form" role="search">
              <div class="form-group md-form mt-0 pt-1 waves-light">
                  <input type="text" class="form-control" placeholder="Search">
              </div>
          </form>
      </li>
      <!--/.Search Form-->
      <!-- Side navigation links -->
      <li>
          <ul class="collapsible collapsible-accordion">
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i> Submit blog<i class="fa fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                      <ul>
                          <li><a href="#" class="waves-effect">Submit listing</a>
                          </li>
                          <li><a href="#" class="waves-effect">Registration form</a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i> Instruction<i class="fa fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                      <ul>
                          <li><a href="#" class="waves-effect">For bloggers</a>
                          </li>
                          <li><a href="#" class="waves-effect">For authors</a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eye"></i> About<i class="fa fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                      <ul>
                          <li><a href="#" class="waves-effect">Introduction</a>
                          </li>
                          <li><a href="#" class="waves-effect">Monthly meetings</a>
                          </li>
                      </ul>
                  </div>
              </li>
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-envelope-o"></i> Contact me<i class="fa fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                      <ul>
                          <li><a href="#" class="waves-effect">FAQ</a>
                          </li>
                          <li><a href="#" class="waves-effect">Write a message</a>
                          </li>
                          <li><a href="#" class="waves-effect">FAQ</a>
                          </li>
                          <li><a href="#" class="waves-effect">Write a message</a>
                          </li>
                          <li><a href="#" class="waves-effect">FAQ</a>
                          </li>
                          <li><a href="#" class="waves-effect">Write a message</a>
                          </li>
                          <li><a href="#" class="waves-effect">FAQ</a>
                          </li>
                          <li><a href="#" class="waves-effect">Write a message</a>
                          </li>
                      </ul>
                  </div>
              </li>
          </ul>
      </li>
      <!--/. Side navigation links -->
  </ul>
  <div class="sidenav-bg rgba-blue-strong"></div>
</div>
<!--/. Sidebar navigation -->
<br><br><br>
<a href="#" data-activates="slide-out" class="btn btn-primary p-3 button-collapse"><i class="fa fa-bars"></i></a>


@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
        $("#strings").val(["Test", "Prof", "Off",]);
        // SideNav Button Initialization
        $(".button-collapse").sideNav();
        // SideNav Scrollbar Initialization
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        Ps.initialize(sideNavScrollbar);
    });
    
</script>
@endsection



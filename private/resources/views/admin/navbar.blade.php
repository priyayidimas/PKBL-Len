    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark white-text scrolling-navbar" style="z-index:1040">
        <div class="container-fluid">
            
            <!-- Collapse -->
            <button id="nav-icon" class="navbar-toggler button-collapse" type="button" data-activates="slide-out" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
            <!-- Brand -->
            <a class="navbar-brand" href="{{url('')}}" target="_blank">
                <strong><img src="{{url('/assets/img/Logo Len.svg')}}" alt="" srcset="" style="height:50px"> PKBL Len</strong>
            </a>
            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                </ul>
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <li class="nav-item d-none d-md-block">
                                {{-- <a class="nav-link" href="{{url('/product')}}">Category</a> --}}
                                <div class="dropdown ">
                                    <a class="nav-link dropdown-toggle mr-5" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                                    <div class="dropdown-menu dropdown-primary">
                                        <a class="dropdown-item" href="#">Update Password</a>
                                        <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                                    </div>
                                </div>
                        </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed" style="margin-top: +50px;">
        
        <div class="user-view">
            <div class="background">
              <img src="{{URL::asset('/assets/img/grayblue.jpg')}}" height="176" width="300">
            </div>
              <a href="#!user"><img class="circle" src="{{url('/assets/img/Male2.png')}}"></a>
              <a href="#!name"><span class="white-text name">{{Auth::user()->name}}</span></a>
              <a href="#!email"><span class="white-text email">{{Auth::user()->email}}</span></a>
            </div>

        <div class="list-group list-group-flush">
            <a id="dashboard" href="{{url('/admin')}}" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-pie-chart mr-3"></i>Dashboard
            </a>
            <div class="btn-group dropright">
                <a id="articles" href="{{url('/admin/blog')}}" class="list-group-item list-group-item-action waves-effect"><i class="fa fa-address-card mr-3"></i>Artikel</a>
                <button type="button" class="btn btn-primary dropdown-toggle px-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('/admin/blog/add')}}">Tambah</a>
                    <a class="dropdown-item" href="{{url('/admin/blog/category')}}">Kategori</a>                    
                    <a class="dropdown-item" href="{{url('/admin/blog/tag')}}">Tag</a>                    
                </div>
            </div>
            <a id="pages" href="{{url('/admin/pages')}}" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-file-o mr-3"></i>Halaman</a>
            <a id="gallery" href="{{url('/admin/gallery')}}" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-image mr-3"></i>Galeri</a>
            <div class="btn-group dropright">
                <a id="products" href="{{url('/admin/products')}}" class="list-group-item list-group-item-action waves-effect"> <i class="fa fa-shopping-bag mr-3"></i>Produk</a>
                <button type="button" class="btn btn-primary dropdown-toggle px-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('/admin/products/add')}}">Tambah</a>
                    <a class="dropdown-item" href="{{url('/admin/products/category')}}">Kategori</a>
                </div>
            </div>
            <a id="config" href="{{url('/admin/config')}}" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-gears mr-3"></i>Konfigurasi</a>
        </div>

    </div>
    <!-- Sidebar -->

    <div id="slide-out" class="side-nav fixed d-lg-none blue darken-2">
            <ul class="custom-scrollbar">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light" style="height:125px">
                        <a href="{{url('')}}"><img src="{{url('/assets/img/Len.png')}}" class="img-fluid " style="height:125px"></a>
                    </div>
                </li>
                <!--/. Logo -->


                <!-- Side navigation links -->
                <li>
          
                    <ul class="collapsible collapsible-accordion">
                        <li><a class="collapsible-header waves-effect arrow-r">Kategori Produk<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                        <li><a class="waves-effect ml-4" href="{{url('products/category/')}}">ASSASA</a></li>                              
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="{{url('/blog')}}">Artikel</a>
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg rgba-blue-strong"></div>
    </div>
@php
    $pages = DB::table('z_page')->where('id','>',1)->get();
    $cprof = DB::table('z_page')->where('page_id','=',1)->get();
    $o = 1;
    $prodCat = DB::table('z_product_cat')->where('parent_id','=',null)->get();
@endphp
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
  <div class="container-fluid">
    <button id="nav-icon" class="navbar-toggler button-collapse" type="button" data-activates="slide-out" aria-controls="navbarSupportedContent"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" ></span>
    </button>
    <a class="navbar-brand" href="{{url('')}}">
      <strong><img src="{{url('/assets/img/Logo Len.svg')}}" alt="" srcset="" style="height:50px"> PKBL Len</strong>
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <div class="dropdown ">
                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu9" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu9">
                    <div class="row">
                        <ul class="list-unstyled col-md-12">
                            @foreach ($cprof as $cprofI)
                            @php
                                $blogProf = DB::table('z_blog')->where('id','=',$cprofI->blog_id)->first();
                            @endphp
                            <li class="nav-item">
                                <a href="{{url('/blog/'.$blogProf->slug)}}" class="nav-link">{{$cprofI->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div> 
                </ul>
            </div>
        </li>
        <li class="nav-item ">
          {{-- <a class="nav-link" href="{{url('/product')}}">Category</a> --}}
          <div class="dropdown ">
              <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori Produk</a>
              {{-- <div class="dropdown-menu dropdown-primary">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                  <a class="dropdown-item" href="#">Something else here</a>

              </div> --}}
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
                  <div class="row">
                      <ul class="list-unstyled col-md-12">
                          @foreach ($prodCat as $pCat)
                          <li><a class="dropdown-item" href="{{url('products/category/'.$pCat->slug)}}">{{$pCat->title}}</a></li>
                          @php
                              $subCat = DB::table('z_product_cat')->where('parent_id','=',$pCat->id)->get();
                          @endphp
                          @foreach ($subCat as $sCat)
                          <li><a class="dropdown-item pl-4" href="{{url('products/category/'.$sCat->slug)}}">{{$sCat->title}}</a></li>                              
                          @endforeach
                          @endforeach
                      </ul>
                  </div> 
              </ul>
          </div>
        </li>
        @foreach ($pages as $page)
        @if ($page->blog_id != null && $page->page_id == null)
        @php
            $blogP = DB::table('z_blog')->where('id','=',$page->blog_id)->first();
        @endphp
        <li class="nav-item">
            <a href="{{url('/blog/'.$blogP->slug)}}" class="nav-link">{{$page->title}}</a>
        </li>
        @elseif($page->blog_id == null)
        <li class="nav-item">
            <div class="dropdown ">
                <a class="nav-link dropdown-toggle " type="button" id="dropdownMenu0{{$o}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$page->title}}</a>
                @php
                    $pageMenu = DB::table('z_page')->where('page_id','=',$page->id)->get();
                @endphp
                <div class="dropdown-menu dropdown-primary" aria-labelledby="dropdownMenu0{{$o}}" style="min-width: 30vh">            
                @foreach ($pageMenu as $pm)
                @php
                    $blogo = DB::table('z_blog')->where('id','=',$pm->blog_id)->first();
                @endphp
                    <a href="{{url('/blog/'.$blogo->slug)}}" class="dropdown-item">{{$pm->title}}</a>
                @endforeach
                </div>
            </div>
        </li>
        @php
            $o++;
        @endphp
        @endif
        @endforeach
        <li class="nav-item"><a href="{{url('/blog')}}" class="nav-link">Artikel</a></li>
        <li class="nav-item">
            <a href="{{url('/blog/kontak')}}" class="nav-link">Kontak</a>
        </li>
      </ul>
      <ul class="navbar-nav nav-flex-icons">
          {{csrf_field()}}
            <form class="form-inline ml-auto" method="GET" action="{{url('/search')}}">
                <div class="md-form my-0">
                    <input class="form-control" name="key" type="text" placeholder="Search" aria-label="Search">
                </div>
            </form>
      </ul>
    </div>
  </div>
</nav>

<div id="slide-out" class="side-nav fixed d-lg-none blue darken-2">
  <ul class="custom-scrollbar">
      <!-- Logo -->
      <li>
          <div class="logo-wrapper waves-light" style="height:125px">
              <a href="{{url('')}}"><img src="{{url('/assets/img/Len.png')}}" class="img-fluid " style="height:125px"></a>
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
          <form class="search-form" role="search"  method="GET" action="{{url('/search')}}">
            {{csrf_field()}}              
              <div class="form-group md-form mt-0 pt-1 waves-light">
                  <input type="text" name="key" class="form-control" placeholder="Search">
              </div>
          </form>
      </li>
      <!--/.Search Form-->
      <!-- Side navigation links -->
      <li>

          <ul class="collapsible collapsible-accordion">
              <li><a class="collapsible-header waves-effect arrow-r">Kategori Produk<i class="fa fa-angle-down rotate-icon"></i></a>
                  <div class="collapsible-body">
                      <ul>
                            @foreach ($prodCat as $pCat)
                            <li><a class="waves-effect" href="{{url('products/category/'.$pCat->slug)}}">{{$pCat->title}}</a></li>
                            @php
                                $subCat = DB::table('z_product_cat')->where('parent_id','=',$pCat->id)->get();
                            @endphp
                            @foreach ($subCat as $sCat)
                            <li><a class="waves-effect ml-4" href="{{url('products/category/'.$sCat->slug)}}">{{$sCat->title}}</a></li>                              
                            @endforeach
                            @endforeach
                      </ul>
                  </div>
              </li>
              @foreach ($pages as $page)
                @if ($page->blog_id != null && $page->page_id == null)
                @php
                    $blogP = DB::table('z_blog')->where('id','=',$page->blog_id)->first();
                @endphp
                <li>
                    <a href="{{url('/blog/'.$blogP->slug)}}">{{$page->title}}</a>
                </li>
                @elseif($page->blog_id == null)
                <li>
                        <a class="collapsible-header waves-effect arrow-r">{{$page->title}}<i class="fa fa-angle-down rotate-icon"></i></a>
                        @php
                            $pageMenu = DB::table('z_page')->where('page_id','=',$page->id)->get();
                        @endphp
                        <div class="collapsible-body">            
                            <ul>
                            @foreach ($pageMenu as $pm)
                            @php
                                $blogo = DB::table('z_blog')->where('id','=',$pm->blog_id)->first();
                            @endphp
                                <li><a href="{{url('/blog/'.$blogo->slug)}}" class="dropdown-item">{{$pm->title}}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
                @endif
                @endforeach
                <li>
                    <a href="{{url('/blog')}}">Artikel</a>
                </li>
          </ul>
      </li>
      <!--/. Side navigation links -->
  </ul>
  <div class="sidenav-bg rgba-blue-strong"></div>
</div>
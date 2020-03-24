@php
    $usaha = DB::table('usaha')->where('id','=',$product->usaha_id)->first();
    $sektor = DB::table('sektor')->where('id','=',$usaha->sektor_id)->first();
    $pemilik = DB::table('pemilik')->where('id','=',$usaha->pemilik_id)->first();
    $prodFirst = DB::table('z_product')->orderBy('created_at','desc')->first();
    $usahaF = DB::table('usaha')->where('id','=',$prodFirst->usaha_id)->first();
    $recProd = DB::table('z_product')->where('id','<>',$prodFirst->id)->orderBy('created_at','desc')->limit(5)->get();     
    $cat1 =DB::table('z_trans_product_cat')->where('product_id','=',$product->id)->get();
@endphp
@extends('t_index')
@section('content')
@section('head')
<style>
  .a{
    height: 80%;
  }
  .b{
    height: 78% !important;
  }
  .carousel-thumbnails .carousel-indicators {
    margin-bottom: -4.5rem;
    position: absolute;
}
  
.carousel-item img {
    max-height: 455px
  }
@media(max-width:992px){
  .carousel-item img {
    max-height: 230px !important;
  }
  .carousel-thumbnails .carousel-indicators{
    margin-bottom: 1.25rem;
  }
  .sd {
    height: 475px;
  }
  .a {
    margin-bottom: 0;
  }
}
@media(max-width:576px){
  .carousel .a {
    margin-bottom: 10px
  }
}

.ind {
  max-height: 75px
}
</style>
@endsection
@include('navbar')
<main class="mt-5 pt-4">
<div class="container mt-5 pt4">
  <div class="row wow fadeIn mb-2">
    <div class="col-12">
        <h5>
        @foreach ($cat1 as $cat0)
        @php
            $cat = DB::table('z_product_cat')->where('id','=',$cat0->category_id)->first();
        @endphp
        <a href="{{url('/products/category/'.$cat->slug)}}" class="badge badge-pill light-blue"><i class="fa fa-industry pr-2"></i>{{$cat->title}}</a>
        @endforeach
        <a class="badge badge-pill indigo"><i class="fa fa-map-marker pr-2"></i>{{$usaha->lokasi}}</a></h5>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="card wow fadeIn mb-4 sd">
        <div class="card-body">
          <h5 class="h5-responsive d-none d-sm-block">{{$product->title}}</h5>
          <hr class="d-none d-md-block">
          <div id="carousel-thumb" class="carousel a slide carousel-fade carousel-thumbnails" data-ride="carousel" data-interval="">
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
              @if ($product->foto1 != null)
              <div class="carousel-item active">
                <img class="d-block w-100" src="{!!url($product->foto1)!!}">
              </div>
              @endif
              @if ($product->foto2 != null)
                <div class="carousel-item">
                    <img class="d-block w-100" src="{!!url($product->foto2)!!}">
                </div>
              @endif
              @if ($product->foto3 != null)
                <div class="carousel-item">
                    <img class="d-block w-100" src="{!!url($product->foto3)!!}">
                </div>
              @endif
              @if ($product->foto4 != null)
                <div class="carousel-item">
                    <img class="d-block w-100" src="{!!url($product->foto4)!!}">
                </div>
              @endif
              </div>
            <!--/.Slides-->
            <!--Controls-->
            <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
            <ol class="carousel-indicators">
                @if ($product->foto1 != null)
                <li data-target="#carousel-thumb" data-slide-to="0" class="active"> <img class="ind d-block w-100" src="{!!url($product->foto1)!!}" class="img-fluid"></li>
                @endif
                @if ($product->foto2 != null)
                <li data-target="#carousel-thumb" data-slide-to="1"><img class="ind d-block w-100" src="{!!url($product->foto2)!!}" class="img-fluid"></li>
                @endif
                @if ($product->foto3 != null)
                <li data-target="#carousel-thumb" data-slide-to="2"><img class="ind d-block w-100" src="{!!url($product->foto3)!!}" class="img-fluid"></li>
                @endif
                @if ($product->foto4 != null)
                <li data-target="#carousel-thumb" data-slide-to="2"><img class="ind d-block w-100" src="{!!url($product->foto4)!!}" class="img-fluid"></li>
                @endif
            </ol>
            
          </div>
          <h5 class="h5-responsive d-sm-none">{{$product->title}}</h5> 
          <hr class="d-md-none" style="margin:0">         
          <div class="row d-sm-none">
              <div class="col-12 h6-responsive">
                Rp.{{number_format($product->harga)}},-
              </div>
          </div>
        </div>
      </div>
      <div class="card wow fadeIn mb-4">
          <div class="card-body">
            <h5 class="h5-responsive">Deskripsi Produk</h5>
            <hr>
            <div class="desc">
              {!!$product->deskripsi!!}
            </div>
          </div>
      </div>
      <div class="card wow mb-4 fadeIn d-sm-none">
          <div class="card-body">
            <h5 class="h5-responsive">Informasi Penjual</h5>
            <hr>
            <h6><b>{{$usaha->nama}}</b></h6><br>
            <p class="pl-2"><i class="fa fa-user pr-2"></i>{{$pemilik->nama}}</p>
            <p class="pl-2"><i class="fa fa-map-marker pr-2"></i>{{$usaha->alamat}}</p>
            <p class="pl-2"><i class="fa fa-phone pr-2"></i>{{$pemilik->kontak}}</p>
            <p class="pl-2"><i class="fa fa-industry pr-2"></i>{{$sektor->nama}}</p>
          </div>
      </div>
    </div>
    <div class="col-md-4 d-none d-sm-block">
      <div class="card wow mb-4 fadeIn">
        <div class="card-body">
          <div class="row">
            <div class="col-4 h5-responsive">
              Rp.
            </div>
            <div class="col-8 text-right h5-responsive">
              {{number_format($product->harga)}},-
            </div>
          </div>
        </div>
      </div>
      <div class="card wow mb-4 fadeIn">
        <div class="card-body">
          <h5 class="h5-responsive">Informasi Penjual</h5>
          <hr>
          <h6><b>{{$usaha->nama}}</b></h6><br>
          <p class="pl-2"><i class="fa fa-user pr-2"></i>{{$pemilik->nama}}</p>
          <p class="pl-2"><i class="fa fa-map-marker pr-2"></i>{{$usaha->alamat}}</p>
          <p class="pl-2"><i class="fa fa-phone pr-2"></i>{{$pemilik->kontak}}</p>
          <p class="pl-2"><i class="fa fa-industry pr-2"></i>{{$sektor->nama}}</p>
        </div>
      </div>
      <div class="card wow mb-4 fadeIn">
        <div class="card-body">
          <h5 class="h5-responsive">Produk Terkait</h5>
          <hr>
          <div id="multi-item-example" class="carousel b slide carousel-multi-item mb-1" data-ride="carousel">
        
              <!--Slides-->
              <div class="carousel-inner" role="listbox">
                  <!--First slide-->
                  <div class="carousel-item active">
          
                      <div class="col-md-12 clearfix">
                              <div class="card card-cascade narrower">

                                      <!-- Card image -->
                                      <div class="view view-cascade overlay prod">
                                        <img class="card-img-top" style="height:280px" src="{{$foto = ($prodFirst->foto1 != null) ? $prodFirst->foto1 : '/assets/img/default.jpeg' }}" alt="Card image cap">
                                        <a>
                                          <div class="mask rgba-white-slight"></div>
                                        </a>
                                      </div>
                                    
                                      <!-- Button -->
                                      <a class="btn-floating btn-action ml-auto mr-4 blue darken-3" href="{{url('/products/'.$prodFirst->slug)}}"><i class="fa fa-shopping-bag"></i></a>
              
                                      <!-- Card content -->
                                      <div class="card-body card-body-cascade" style="margin:0px">
              
                                        <!-- Title -->
                                        <h6 class="card-title" style="margin:0px"><a>{{$prodFirst->title}}</a></h6>
                                        <hr style="margin:5px">
                                        <h6 class="light-blue-text" style="margin:0px">Rp. {{number_format($prodFirst->harga)}} ,-</h6>
                                      </div>
              
                                      <!-- Card footer -->
                                      <div class="rounded-bottom blue darken-3 text-center pt-3">
                                        <ul class="list-unstyled list-inline font-small text-left pl-2">
                                          <li class="list-inline-item pr-2 white-text"><i class="fa fa-clock-o pr-1"></i>{{Carbon::parse($prodFirst->created_at)->format('d/m/Y')}}</li>
                                          <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fa fa-user-o pr-1"></i>{{$usahaF->nama}}</a></li>
                                          <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fa fa-map-marker pr-1"></i>{{$usahaF->lokasi}}</a></li>
                                        </ul>
                                      </div>
                                </div>
                      </div>
          
                  </div>
                  @foreach ($recProd as $prod)
                      @php
                          $usaha = DB::table('usaha')->where('id','=',$prod->usaha_id)->first();
                      @endphp
                       <div class="carousel-item">
                          <div class="col-md-12 clearfix">
                              <div class="card card-cascade narrower">

                                  <!-- Card image -->
                                  <div class="view view-cascade overlay prod">
                                  <img class="card-img-top" style="height:280px" src="{{$foto = ($prod->foto1 != null) ? $prod->foto1 : '/assets/img/default.jpeg' }}" alt="Card image cap">
                                  <a>
                                      <div class="mask rgba-white-slight"></div>
                                  </a>
                                  </div>
                              
                                  <!-- Button -->
                                  <a class="btn-floating btn-action ml-auto mr-4 blue darken-3" href="{{url('/products/'.$prod->slug)}}"><i class="fa fa-shopping-bag"></i></a>

                                  <!-- Card content -->
                                  <div class="card-body card-body-cascade" style="margin:0px">

                                  <!-- Title -->
                                  <h6 class="card-title" style="margin:0px"><a>{{$prod->title}}</a></h6>
                                  <hr style="margin:5px">
                                  <h6 class="light-blue-text" style="margin:0px">Rp. {{number_format($prod->harga)}} ,-</h6>
                                  </div>

                                  <!-- Card footer -->
                                  <div class="rounded-bottom blue darken-3 text-center pt-3">
                                  <ul class="list-unstyled list-inline font-small text-left pl-2">
                                      <li class="list-inline-item pr-2 white-text"><i class="fa fa-clock-o pr-1"></i>{{Carbon::parse($prod->created_at)->format('d/m/Y')}}</li>
                                      <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fa fa-user-o pr-1"></i>{{$usaha->nama}}</a></li>
                                      <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fa fa-map-marker pr-1"></i>{{$usaha->lokasi}}</a></li>
                                  </ul>
                                  </div>
                              </div>
                          </div>
                       </div>
                  @endforeach
          
              </div>
              <!--/.Slides-->
              <!--Controls-->
              <div class="controls-top" style="margin:0;">
                  <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                  <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
              </div>
              <!--/.Controls-->
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</main>
@include('footer')
@endsection
@section('script')
<script type="text/javascript">
  // Animations initialization
  new WOW().init();
</script>
@endsection
<body>
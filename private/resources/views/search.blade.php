@php
    $cat = DB::table('z_blog_cat')->where('parent_id','=',null)->get();
    $recBlog = DB::table('z_blog')->orderBy('created_at','desc')->limit(5)->get();    
    $prodFirst = DB::table('z_product')->orderBy('created_at','desc')->first();
    $usahaF = DB::table('usaha')->where('id','=',$prodFirst->usaha_id)->first();
    $recProd = DB::table('z_product')->where('id','<>',$prodFirst->id)->orderBy('created_at','desc')->limit(5)->get(); 
@endphp
@extends('t_index')
@section('head')
<style>
    .mast {
        max-height: 255px;
        width: 100%;
    }

    .truncate {
        max-height: 72px;
        overflow: hidden;
        text-overflow: "...";
    }
    .card-img-top {
        height: 255px;
    }
</style>
@endsection
@section('content')
@include('navbar')
    <main class="mt-5 pt-4">
        <div class="container">
            <section class="pt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card wow fadeIn mb-4">
                            <div class="card-body">
                                <p class="h5-responsive">Hasil Pencarian Untuk "{{$key}}"</p>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card transparent wow fadeIn mb-4">
                            <div class="card-body">
                                <h5 class="h5-responsive">Artikel</h5>
                                <hr>
                                @if ($blogs->count() > 0)
                                @foreach ($blogs->get() as $blog)
                                @php
                                    $categories = DB::table('z_trans_blog_cat')->where('blog_id','=',$blog->id)->get();
                                    $tags = DB::table('z_trans_blog_tag')->where('blog_id','=',$blog->id)->get();
                                @endphp
                                <div class="card mb-4">
                                    <div class="card-body row mt-3 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
    
                                                <!--Grid column-->
                                                <div class="col-lg-5 col-xl-4 mb-3">
                                                    <!--Featured image-->
                                                    <div class="view overlay rounded z-depth-1">
                                                        <img src="{{$foto = ($blog->masthead != null) ? $blog->masthead : '/assets/img/default.jpeg'}}" class="img-fluid mast" alt="">
                                                        <a href="{{url('/blog/'.$blog->slug)}}">
                                                            <div class="mask rgba-white-slight waves-effect waves-light"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--Grid column-->
                        
                                                <!--Grid column-->
                                                <div class="col-lg-7 col-xl-7 ml-xl-4 mb-3">
                                                    <small class="text-muted"><i class="fa fa-clock-o mr-1"></i>Posted On : {{Carbon::parse($blog->created_at)->format('d F Y')}}</small><br>
                                                    <h5 class="h5-responsive mb-3 font-weight-bold dark-grey-text">
                                                        <strong>{{$blog->title}}</strong>
                                                    </h5>
                                                    <p class="truncate">{{strip_tags($blog->content)}}</p>
                                                    <p><i class="fa fa-folder-o mr-1"></i>
                                                        @foreach ($categories as $category)
                                                            @php
                                                                $categoryName = DB::table('z_blog_cat')->where('id','=',$category->category_id)->first();
                                                            @endphp
                                                            <a href="{{url('/blog/category/'.$categoryName->slug)}}">{{$categoryName->title}},</a>
                                                        @endforeach 
                                                    </p>
                                                    <p><i class="fa fa-tag mr-1"></i>
                                                        @foreach ($tags as $tag)
                                                            @php
                                                                $tagName = DB::table('z_blog_tag')->where('id','=',$tag->tag_id)->first();
                                                            @endphp
                                                            <a href="{{url('/blog/tag/'.$tagName->slug)}}">{{$tagName->title}},</a>
                                                        @endforeach 
                                                    </p>
                                                    <a href="{{url('/blog/'.$blog->slug)}}" class="btn btn-primary btn-md waves-effect waves-light">Baca Selengkapnya
                                                        <i class="fa fa-play ml-2"></i>
                                                    </a>
                                                </div>
                                                <!--Grid column-->
                        
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <p class="text-center">Tidak Ditemukan Hasil Untuk Pencarian Ini</p>    
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card transparent wow fadeIn mb-4">
                            <div class="card-body">
                                <h5 class="h5-responsive">Produk Mitra Binaan</h5>
                                <hr>          
                                @if ($products->count() > 0)
                                <div class="row">                          
                                @foreach ($products->get() as $prod)
                                @php
                                $usaha = DB::table('usaha')->where('id','=',$prod->usaha_id)->first();
                                @endphp
                                <div class="col-md-6 mb-4">
                                    <div class="card card-cascade">
                        
                                                <!-- Card image -->
                                                <div class="view view-cascade overlay prod">
                                                  <img class="card-img-top" src="{{$foto = ($prod->foto1 != null) ? $prod->foto1 : '/assets/img/default.jpeg' }}" alt="Card image cap">
                                                  <a>
                                                    <div class="mask rgba-white-slight"></div>
                                                  </a>
                                                </div>
                                              
                                                <!-- Button -->
                                                <a class="btn-floating btn-action ml-auto mr-4 blue darken-3" href="{{url('/products/'.$prod->slug)}}"><i class="fa fa-shopping-bag pl-1"></i></a>
                        
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
                                                    <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fa fa-user-o pr-1"></i>{{$usaha->nama}}</a></li>
                                                    <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fa fa-map-marker pr-1"></i>{{$usaha->lokasi}}</a></li>
                                                  </ul>
                                                </div>
                                    </div>
                                </div>
                                @endforeach
                                </div>
                                @else
                                <p class="text-center">Tidak Ditemukan Hasil Untuk Pencarian Ini</p>    
                                @endif                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@include('footer')
@endsection
@section('script')
<script src="{{url('/assets/js/clamp.min.js')}}"></script>
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
        var module = document.getElementsByClassName("truncate");
        $clamp(module, {clamp: 3});
    </script>
@endsection
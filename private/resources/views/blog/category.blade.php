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

   .carousel{
        height:inherit
    }

    .truncate {
        max-height: 72px;
        overflow: hidden;
        text-overflow: "...";
    }
</style>
@endsection
@section('content')
@include('navbar')
    <main class="mt-5 pt-4">
        <div class="container">
            <section class="pt-5">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="divider">
                            <span><h4>Category : "{{$curCat}}"</h4></span>
                        </div>

                        @foreach ($trans as $tran)
                        @php
                            $blog = DB::table('z_blog')->where('id','=',$tran->blog_id)->first();
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
                                                <h3 class="h3-responsive mb-3 font-weight-bold dark-grey-text">
                                                    <strong>{{$blog->title}}</strong>
                                                </h3>
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
                                    <!--Grid row-->
                        </div>
                        @endforeach

                        {{$trans->links('vendor.pagination.bootstrap-4')}}
                    </div>

                    <div class="col-lg-4">
                            <div class="card mb-4 wow fadeIn">
                                    <div class="card-header">Mitra Binaan PT Len Industri</div>
                                    <div class="card-body text-left">
                                            <div id="multi-item-example" class="carousel slide carousel-multi-item mb-1" data-ride="carousel">
        
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
                            <div class="card mb-5">
                                <div class="card-header">Recent Post</div>
                                <div class="card-body text-left">
                                    @foreach ($recBlog as $rec)
                                        <a href="{{url('/blog/'.$rec->slug)}}" >{{$rec->title}}</a>
                                        <hr class="mb-1">
                                    @endforeach
                                </div>                                
                            </div>
                            <div class="card mb-5">
                                <div class="card-header">Categories</div>
                                <div class="card-body text-left">
                                    @foreach ($cat as $ct)
                                        <a href="{{url('/blog/category/'.$ct->slug)}}" >{{$ct->title}}</a>
                                        <hr class="mb-1">
                                        @php
                                            $sub = DB::table('z_blog_cat')->where('parent_id','=',$ct->id)->get();
                                        @endphp
                                        @foreach ($sub as $sCat)
                                        <a class="pl-2" href="{{url('/blog/category/'.$sCat->slug)}}" >{{$sCat->title}}</a>
                                        <hr class="mb-1">                                        
                                        @endforeach
                                    @endforeach
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
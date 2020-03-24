@php
    $cat = DB::table('z_product_cat')->where('parent_id','=',null)->get();
    $recBlog = DB::table('z_blog')->orderBy('created_at','desc')->limit(5)->get();    
@endphp
@extends('t_index')
@section('head')
<style>
    .mast {
        max-height: 255px;
        width: 100%;
    }
    .card-img-top {
        height: 250px;
    }
    .truncate {
        max-height: 72px;
        overflow: hidden;
        text-overflow: "...";
    }
    @media(max-width:768px){
        .card-img-top {
            height: 245px
        }
    }
</style>
@endsection
@section('content')
@include('navbar')
    <main class="mt-5 pt-4">
        <div class="container">
            <section class="pt-5">
                <div class="row">
                    <div class="col-md-3 d-none d-sm-block">
                            <div class="card mb-5 wow fadeIn">
                                <div class="card-header">Categories</div>
                                <div class="card-body text-left">
                                    @foreach ($cat as $ct)
                                        <a href="{{url('/products/category/'.$ct->slug)}}" >{{$ct->title}}</a>
                                        <hr class="mb-1">
                                        @php
                                            $sub = DB::table('z_product_cat')->where('parent_id','=',$ct->id)->get();
                                        @endphp
                                        @foreach ($sub as $sCat)
                                        <a class="pl-2" href="{{url('/products/category/'.$sCat->slug)}}" >{{$sCat->title}}</a>
                                        <hr class="mb-1">                                        
                                        @endforeach
                                    @endforeach
                                </div>                                
                            </div>
                            <div class="card mb-5 wow fadeIn">
                                <div class="card-header">Artikel Terbaru</div>
                                <div class="card-body text-left">
                                    @foreach ($recBlog as $rec)
                                        <a href="{{url('/blog/'.$rec->slug)}}" >{{$rec->title}}</a>
                                        <hr class="mb-1">
                                    @endforeach
                                </div>                                
                            </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="divider">
                            <span><h4>Category : "{{$curCat}}"</h4></span>
                        </div>
                        <div class="row">
                        @foreach ($trans as $tran)
                        @php
                            $prod = DB::table('z_product')->where('id','=',$tran->product_id)->first();
                            $categories = DB::table('z_trans_product_cat')->where('product_id','=',$prod->id)->get();
                            $usaha = DB::table('usaha')->where('id','=',$prod->usaha_id)->first();
                        @endphp
                            <div class="col-lg-4 col-md-6 mb-4">
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

                        {{$trans->links('vendor.pagination.bootstrap-4')}}
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
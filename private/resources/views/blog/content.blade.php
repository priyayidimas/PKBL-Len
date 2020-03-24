@php
    $cat = DB::table('z_blog_cat')->where('parent_id','=',null)->get();
    $curCat = DB::table('z_trans_blog_cat')->where('blog_id','=',$blog->id);
    $curTag = DB::table('z_trans_blog_tag')->where('blog_id','=',$blog->id);
    $recBlog = DB::table('z_blog')->orderBy('created_at','desc')->limit(5)->get();    
    $next = DB::table('z_blog')->where('id','>',$blog->id);
    $prev = DB::table('z_blog')->where('id','<',$blog->id);
    $relBlogCat = DB::table('z_trans_blog_cat')->where('category_id','=',$curCat->first()->category_id)->where('blog_id','<>',$blog->id);
    $prodFirst = DB::table('z_product')->orderBy('created_at','desc')->first();
    $usahaF = DB::table('usaha')->where('id','=',$prodFirst->usaha_id)->first();
    $recProd = DB::table('z_product')->where('id','<>',$prodFirst->id)->orderBy('created_at','desc')->limit(5)->get();    
@endphp
@extends('t_index')
@section('head')
<style>
    .masthead img {
        max-height: 375px;
    }
    .content img{
        max-width: 100%;
    }

    .carousel{
        height:inherit
    }
</style>
@endsection
@section('content')
@include('navbar')
    <main class="mt-5 pt-4">
        <div class="container">

            <!--Section: Post-->
            <section class="mt-4">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-8 mb-4">

                        <!--Featured Image-->
                        <div class="card mb-4 masthead wow fadeIn">

                            <img src="{{$blog->masthead}}" class="img-fluid" alt="">

                        </div>
                        <!--/.Featured Image-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <!--Card content-->
                            <div class="card-body">

                                <p class="h3-responsive my-4">{{$blog->title}}</p>
                                <span class="text-muted">Posted On &nbsp;&nbsp;&nbsp;<i class="fa fa-clock-o mr-1"></i>{{Carbon::parse($blog->published_at)->format('d F Y')}} In &nbsp;&nbsp;&nbsp;<i class="fa fa-folder-o mr-1"></i>
                                    @foreach ($curCat->get() as $category)
                                    @php
                                        $categoryName = DB::table('z_blog_cat')->where('id','=',$category->category_id)->first();
                                    @endphp
                                    <a href="{{url('/blog/category/'.$categoryName->slug)}}">{{$categoryName->title}},</a>
                                    @endforeach 
                                </span>
                                <hr>
                                <div class="content text-responsive">
                                    {!!$blog->content!!}
                                </div>
                                <hr>
                                <div class="row ml-2">
                                    <h3><span class="badge blue darken-3"><i class="fa fa-tag mr-1"></i></span></h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <h5 style="margin-top: 6px">    
                                        @foreach ($curTag->get() as $tag)
                                        @php
                                            $tagName = DB::table('z_blog_tag')->where('id','=',$tag->tag_id)->first();
                                        @endphp
                                        <a href="{{url('/blog/tag/'.$tagName->slug)}}" class="badge blue mt-1">{{$tagName->title}}</a>
                                        @endforeach 
                                    </h5>
                                </div>
                            </div>

                        </div>
                        <!--/.Card-->

                        <div class="card mb-4 wow fadeIn">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        @if ($prev->count() > 0)
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img class="img-responsive mt-1" style="width:100%" src="{{$foto = ($prev->first()->masthead != null) ? $prev->first()->masthead : '/assets/img/default.jpeg' }}" alt="" srcset="">
                                            </div>
                                            <div class="col-md-8">
                                                <a href="{{url('/blog/'.$prev->first()->slug)}}"><strong class="black-text"><< Previous Post</strong><br>{{$prev->first()->title}}</a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 text-right">
                                        @if ($next->count() > 0)
                                        <div class="row">
                                                <div class="col-md-8">
                                                    <a href="{{url('/blog/'.$next->first()->slug)}}"><strong class="black-text">Next Post >></strong><br>{{$next->first()->title}}</a>
                                                </div>
                                                <div class="col-md-4">
                                                    <img class="img-responsive mt-1" style="width:100%" src="{{$foto = ($next->first()->masthead != null) ? $next->first()->masthead : '/assets/img/default.jpeg' }}" alt="" srcset="">
                                                </div>
                                            </div>
                                           
                                            
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 wow fadeIn">
                            <div class="card-body">
                                <h5>Related Posts</h5><br>
                                @foreach ($relBlogCat->get() as $relCat)
                                    @php
                                    $relaBlogCat = DB::table('z_blog')->where('id','=',$relCat->blog_id)->first();
                                    @endphp
                                    <a href="{{url('/blog/'.$relaBlogCat->slug)}}">{{$relaBlogCat->title}}</a>
                                    <hr>
                                @endforeach                                                                
                            </div>
                        </div>

                        {{-- <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <div class="card-header font-weight-bold">
                                <span>About author</span>
                                <span class="pull-right">
                                    <a href="">
                                        <i class="fa fa-facebook mr-2"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-twitter mr-2"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-instagram mr-2"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-linkedin mr-2"></i>
                                    </a>
                                </span>
                            </div>

                            <!--Card content-->
                            <div class="card-body">

                                <div class="media d-block d-md-flex mt-3">
                                    <img class="d-flex mb-3 mx-auto z-depth-1" src="https://mdbootstrap.com/img/Photos/Avatars/img (30).jpg" alt="Generic placeholder image"
                                        style="width: 100px;">
                                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                        <h5 class="mt-0 font-weight-bold">Caroline Horwitz
                                        </h5>
                                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti
                                        quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                                        similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum
                                        fuga.
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!--/.Card--> --}}

                        {{-- <!--Comments-->
                        <div class="card card-comments mb-3 wow fadeIn">
                            <div class="card-header font-weight-bold">3 comments</div>
                            <div class="card-body">

                                <div class="media d-block d-md-flex mt-4">
                                    <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (20).jpg" alt="Generic placeholder image">
                                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                        <h5 class="mt-0 font-weight-bold">Miley Steward
                                            <a href="" class="pull-right">
                                                <i class="fa fa-reply"></i>
                                            </a>
                                        </h5>
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                                        <div class="media d-block d-md-flex mt-3">
                                            <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (27).jpg" alt="Generic placeholder image">
                                            <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                                <h5 class="mt-0 font-weight-bold">Tommy Smith
                                                    <a href="" class="pull-right">
                                                        <i class="fa fa-reply"></i>
                                                    </a>
                                                </h5>
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                                ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                                                sunt explicabo.
                                            </div>
                                        </div>

                                        <!-- Quick Reply -->
                                        <div class="form-group mt-4">
                                            <label for="quickReplyFormComment">Your comment</label>
                                            <textarea class="form-control" id="quickReplyFormComment" rows="5"></textarea>

                                            <div class="text-center">
                                                <button class="btn btn-info btn-sm" type="submit">Post</button>
                                            </div>
                                        </div>


                                        <div class="media d-block d-md-flex mt-3">
                                            <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (21).jpg" alt="Generic placeholder image">
                                            <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                                <h5 class="mt-0 font-weight-bold">Sylvester the Cat
                                                    <a href="" class="pull-right">
                                                        <i class="fa fa-reply"></i>
                                                    </a>
                                                </h5>
                                                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
                                                tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="media d-block d-md-flex mt-3">
                                    <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (30).jpg" alt="Generic placeholder image">
                                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                        <h5 class="mt-0 font-weight-bold">Caroline Horwitz
                                            <a href="" class="pull-right">
                                                <i class="fa fa-reply"></i>
                                            </a>
                                        </h5>
                                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti
                                        quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                                        similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum
                                        fuga.
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--/.Comments--> --}}
                        {{-- 
                        <!--Reply-->
                        <div class="card mb-3 wow fadeIn">
                            <div class="card-header font-weight-bold">Leave a reply</div>
                            <div class="card-body">

                                <!-- Default form reply -->
                                <form>

                                    <!-- Comment -->
                                    <div class="form-group">
                                        <label for="replyFormComment">Your comment</label>
                                        <textarea class="form-control" id="replyFormComment" rows="5"></textarea>
                                    </div>

                                    <!-- Name -->
                                    <label for="replyFormName">Your name</label>
                                    <input type="email" id="replyFormName" class="form-control">

                                    <br>

                                    <!-- Email -->
                                    <label for="replyFormEmail">Your e-mail</label>
                                    <input type="email" id="replyFormEmail" class="form-control">


                                    <div class="text-center mt-4">
                                        <button class="btn btn-info btn-md" type="submit">Post</button>
                                    </div>
                                </form>
                                <!-- Default form reply -->



                            </div>
                        </div> --}}
                        <!--/.Reply-->

                    </div>
                    <!--Grid column-->

                    <div class="col-md-4 mb-4">

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
                        <div class="card mb-4 wow fadeIn">
                            <div class="card-header">Recent Post</div>
                            <div class="card-body text-left">
                                @foreach ($recBlog as $rec)
                                    <a href="{{url('/blog/'.$rec->slug)}}" >{{$rec->title}}</a>
                                    <hr class="mb-1">
                                @endforeach
                            </div>                                
                        </div>
                        <div class="card mb-4 wow fadeIn">
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

                    {{-- <!--Grid column-->
                    <div class="col-md-4 mb-4">

                        <!--Card: Jumbotron-->
                        <div class="card gradient-custom mb-4 wow fadeIn">

                            <!-- Content -->
                            <div class="card-body text-white text-center">

                                <h4 class="mb-4">
                                    <strong>Learn Bootstrap 4 with MDB</strong>
                                </h4>
                                <p>
                                    <strong>Best & free guide of responsive web design</strong>
                                </p>
                                <p class="mb-4">
                                    <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video
                                        and written versions available. Create your own, stunning website.</strong>
                                </p>
                                <a target="_blank" href="https://mdbootstrap.com/bootstrap-tutorial/" class="btn btn-outline-white btn-md">Start free tutorial
                                    <i class="fa fa-graduation-cap ml-2"></i>
                                </a>

                            </div>
                            <!-- Content -->
                        </div>
                        <!--Card: Jumbotron-->

                        <!--Card : Dynamic content wrapper-->
                        <div class="card mb-4 text-center wow fadeIn">

                            <div class="card-header">Do you want to get informed about new articles?</div>

                            <!--Card content-->
                            <div class="card-body">

                                <!-- Default form login -->
                                <form>

                                    <!-- Default input email -->
                                    <label for="defaultFormEmailEx" class="grey-text">Your email</label>
                                    <input type="email" id="defaultFormLoginEmailEx" class="form-control">

                                    <br>

                                    <!-- Default input password -->
                                    <label for="defaultFormNameEx" class="grey-text">Your name</label>
                                    <input type="text" id="defaultFormNameEx" class="form-control">

                                    <div class="text-center mt-4">
                                        <button class="btn btn-info btn-md" type="submit">Sign up</button>
                                    </div>
                                </form>
                                <!-- Default form login -->

                            </div>

                        </div>
                        <!--/.Card : Dynamic content wrapper-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <div class="card-header">Related articles</div>

                            <!--Card content-->
                            <div class="card-body">

                                <ul class="list-unstyled">
                                    <li class="media">
                                        <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder7.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="">
                                                <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla (...)
                                        </div>
                                    </li>
                                    <li class="media my-4">
                                        <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder6.jpg" alt="An image">
                                        <div class="media-body">
                                            <a href="">
                                                <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla (...)
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder5.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="">
                                                <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla (...)
                                        </div>
                                    </li>
                                </ul>

                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column--> --}}

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Post-->

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
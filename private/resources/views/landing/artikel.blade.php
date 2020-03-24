    @php
        $recBlog = DB::table('z_blog')->orderBy('created_at','desc')->limit(6)->get();
        $co = 0;
        foreach ($recBlog as $rec) {
            $slug[$co] = $rec->slug;
            $title[$co] = $rec->title;
            $published[$co] = $rec->published_at;
            $masthead[$co] = $rec->masthead;
            $content[$co] = $rec->content;
            $co++;
        }
    @endphp
    <section class="wow fadeIn">
            <!--Grid row-->
            <div class="row text-left">

                <!--Grid column-->
                <div class="col-lg-6 col-md-12">

                    <div class="featured-lg d-none d-md-block">
                        <div class="view overlay rounded z-depth-1-half mb-3 mast">
                                <img src="{{$foto = ($masthead[0] != null) ? $masthead[0] : '/assets/img/default.jpeg' }}" class="img-fluid" alt="Sample post image">
                                <a href="{{url('/blog/'.$slug[0])}}">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                        </div>
        
                        <!--Excerpt-->
                        <div class="news-data">
                            <p>
                                <strong>
                                    <i class="fa fa-clock-o"></i> {{Carbon::parse($published[0])->format('d/m/Y')}}</strong>
                            </p>
                        </div>
                        <h5>
                            <a href="{{url('/blog/'.$slug[0])}}">
                                <strong>{{$title[0]}}</strong>
                            </a>
                        </h5>
                        <p id="truncate"> {{strip_tags($content[0])}}
                        </p>
                    </div>
                    <div class="featured-sm d-md-none d-sm-block">
                            <div class="row">
                                    <div class="col-md-3">
            
                                        <!--Image-->
                                        <div class="view overlay rounded z-depth-1">
                                            <img src="{{$foto = ($masthead[0] != null) ? $masthead[0] : '/assets/img/default.jpeg' }}" class="img-fluid" alt="Minor sample post image">
                                            <a href="{{url('/blog/'.$slug[0])}}">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                    </div>
            
                                    <!--Excerpt-->
                                    <div class="col-md-9">
                                        <p class="dark-grey-text">
                                            <strong> {{Carbon::parse($published[0])->format('d/m/Y')}}</strong>
                                        </p>
                                        <a href="{{url('/blog/'.$slug[0])}}">{{$title[0]}}
                                            <i class="fa fa-angle-right float-right"></i>
                                        </a>
                                    </div>
            
                            </div>
                    </div>
                    <hr>

                    <!--Small news-->
                    <div class="row">
                        <div class="col-md-3">

                            <!--Image-->
                            <div class="view overlay rounded z-depth-1 ">
                                <img src="{{$foto = ($masthead[2] != null) ? $masthead[2] : '/assets/img/default.jpeg' }}" class="img-fluid" alt="Minor sample post image">
                                <a href="{{url('/blog/'.$slug[2])}}">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                        </div>

                        <!--Excerpt-->
                        <div class="col-md-9">
                            <p class="dark-grey-text">
                                <strong> {{Carbon::parse($published[2])->format('d/m/Y')}}</strong>
                            </p>
                            <a href="{{url('/blog/'.$slug[2])}}">{{$title[2]}}
                                <i class="fa fa-angle-right float-right"></i>
                            </a>
                        </div>

                    </div>
                    <!--/Small news-->

                    <hr>

                    <!--Small news-->
                    <div class="row">
                        <div class="col-md-3">

                            <!--Image-->
                            <div class="view overlay rounded z-depth-1">
                                <img src="{{$foto = ($masthead[4] != null) ? $masthead[4] : '/assets/img/default.jpeg' }}" class="img-fluid" alt="Minor sample post image">
                                <a href="{{url('/blog/'.$slug[4])}}">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                        </div>

                        <!--Excerpt-->
                        <div class="col-md-9">
                            <p class="dark-grey-text">
                                <strong> {{Carbon::parse($published[4])->format('d/m/Y')}}</strong>
                            </p>
                            <a href="{{url('/blog/'.$slug[4])}}">{{$title[4]}}
                                <i class="fa fa-angle-right float-right"></i>
                            </a>
                        </div>

                    </div>
                    <!--/Small news-->


                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-12">

                    <div class="featured-lg d-none d-md-block">
                        <div class="view overlay rounded z-depth-1-half mb-3 mast">
                            <img src="{{$foto = ($masthead[1] != null) ? $masthead[1] : '/assets/img/default.jpeg' }}" class="img-fluid" alt="Sample post image">
                            <a href="{{url('/blog/'.$slug[1])}}">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
    
                        <!--Excerpt-->
                        <div class="news-data">
                            <p>
                                <strong>
                                    <i class="fa fa-clock-o"></i> {{Carbon::parse($published[1])->format('d/m/Y')}}</strong>
                            </p>
                        </div>
                        <h5>
                            <a href="{{url('/blog/'.$slug[1])}}">
                                <strong>{{$title[1]}}</strong>
                            </a>
                        </h5>
                        <p id="truncate1"> {{strip_tags($content[1])}}
                        </p>
                    </div>
                    <div class="featured-sm d-md-none d-sm-block">
                            <div class="row">
                                    <div class="col-md-3">
            
                                        <!--Image-->
                                        <div class="view overlay rounded z-depth-1">
                                            <img src="{{$foto = ($masthead[1] != null) ? $masthead[1] : '/assets/img/default.jpeg' }}" class="img-fluid" alt="Minor sample post image">
                                            <a href="{{url('/blog/'.$slug[1])}}">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                    </div>
            
                                    <!--Excerpt-->
                                    <div class="col-md-9">
                                        <p class="dark-grey-text">
                                            <strong> {{Carbon::parse($published[1])->format('d/m/Y')}}</strong>
                                        </p>
                                        <a href="{{url('/blog/'.$slug[1])}}">{{$title[1]}}
                                            <i class="fa fa-angle-right float-right"></i>
                                        </a>
                                    </div>
            
                            </div>
                    </div>

                    <!--/Featured news-->

                    <hr>

                    <!--Small news-->
                    <div class="row">
                        <div class="col-md-3">

                            <!--Image-->
                            <div class="view overlay rounded z-depth-1">
                                <img src="{{$foto = ($masthead[3] != null) ? $masthead[3] : '/assets/img/default.jpeg' }}" class="img-fluid" alt="Minor sample post image">
                                <a href="{{url('/blog/'.$slug[3])}}">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                        </div>

                        <!--Excerpt-->
                        <div class="col-md-9">
                            <p class="dark-grey-text">
                                <strong> {{Carbon::parse($published[3])->format('d/m/Y')}}</strong>
                            </p>
                            <a href="{{url('/blog/'.$slug[3])}}">{{$title[3]}}
                                <i class="fa fa-angle-right float-right"></i>
                            </a>
                        </div>

                    </div>
                    <!--/Small news-->

                    <hr>

                    <!--Small news-->
                    <div class="row">
                        <div class="col-md-3">

                            <!--Image-->
                            <div class="view overlay rounded z-depth-1 ">
                                <img src="{{$foto = ($masthead[5] != null) ? $masthead[5] : '/assets/img/default.jpeg' }}" class="img-fluid" alt="Minor sample post image">
                                <a href="{{url('/blog/'.$slug[5])}}">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                        </div>

                        <!--Excerpt-->
                        <div class="col-md-9">
                            <p class="dark-grey-text">
                                <strong> {{Carbon::parse($published[5])->format('d/m/Y')}}</strong>
                            </p>
                            <a href="{{url('/blog/'.$slug[5])}}">{{$title[5]}}
                                <i class="fa fa-angle-right float-right"></i>
                            </a>
                        </div>

                    </div>
                    <!--/Small news-->

                    <hr>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

    </section>
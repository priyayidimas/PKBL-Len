    @php
        $recProd = DB::table('z_product')->orderBy('created_at','desc')->limit(8)->get();
    @endphp
    <!--Section: Products v.3-->
    <section id="" class="text-center mb-4 wow fadeIn">
        <div class="row wow fadeIn">
            @foreach ($recProd as $prod)
            @php
                $usaha = DB::table('usaha')->where('id','=',$prod->usaha_id)->first();
                // echo $prod->usaha_id;
            @endphp
            <div class="col-lg-3 col-md-6 mb-4">

                <!-- Card Regular -->
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
    
            {{-- <!--Grid row-->
            <div class="row wow fadeIn">
    
              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4">
    
                <!--Card-->
                <div class="card">
    
                  <!--Card image-->
                  <div class="view overlay">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="card-img-top" alt="">
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <!--Card image-->
    
                  <!--Card content-->
                  <div class="card-body text-center">
                    <!--Category & Title-->
                    <a href="" class="grey-text">
                      <h5>Shirt</h5>
                    </a>
                    <h5>
                      <strong>
                        <a href="" class="dark-grey-text">Denim shirt
                          <span class="badge badge-pill danger-color">NEW</span>
                        </a>
                      </strong>
                    </h5>
    
                    <h4 class="font-weight-bold blue-text">
                      <strong>120$</strong>
                    </h4>
    
                  </div>
                  <!--Card content-->
    
                </div>
                <!--Card-->
    
              </div>
              <!--Grid column-->
    
              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4">
    
                <!--Card-->
                <div class="card">
    
                  <!--Card image-->
                  <div class="view overlay">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14.jpg" class="card-img-top" alt="">
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <!--Card image-->
    
                  <!--Card content-->
                  <div class="card-body text-center">
                    <!--Category & Title-->
                    <a href="" class="grey-text">
                      <h5>Sport wear</h5>
                    </a>
                    <h5>
                      <strong>
                        <a href="" class="dark-grey-text">Sweatshirt</a>
                      </strong>
                    </h5>
    
                    <h4 class="font-weight-bold blue-text">
                      <strong>139$</strong>
                    </h4>
    
                  </div>
                  <!--Card content-->
    
                </div>
                <!--Card-->
    
              </div>
              <!--Grid column-->
    
              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4">
    
                <!--Card-->
                <div class="card">
    
                  <!--Card image-->
                  <div class="view overlay">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15.jpg" class="card-img-top" alt="">
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <!--Card image-->
    
                  <!--Card content-->
                  <div class="card-body text-center">
                    <!--Category & Title-->
                    <a href="" class="grey-text">
                      <h5>Sport wear</h5>
                    </a>
                    <h5>
                      <strong>
                        <a href="" class="dark-grey-text">Grey blouse
                          <span class="badge badge-pill primary-color">bestseller</span>
                        </a>
                      </strong>
                    </h5>
    
                    <h4 class="font-weight-bold blue-text">
                      <strong>99$</strong>
                    </h4>
    
                  </div>
                  <!--Card content-->
    
                </div>
                <!--Card-->
    
              </div>
              <!--Grid column-->
    
              <!--Fourth column-->
              <div class="col-lg-3 col-md-6 mb-4">
    
                <!--Card-->
                <div class="card">
    
                  <!--Card image-->
                  <div class="view overlay">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12.jpg" class="card-img-top" alt="">
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <!--Card image-->
    
                  <!--Card content-->
                  <div class="card-body text-center">
                    <!--Category & Title-->
                    <a href="" class="grey-text">
                      <h5>Outwear</h5>
                    </a>
                    <h5>
                      <strong>
                        <a href="" class="dark-grey-text">Black jacket</a>
                      </strong>
                    </h5>
    
                    <h4 class="font-weight-bold blue-text">
                      <strong>219$</strong>
                    </h4>
    
                  </div>
                  <!--Card content-->
    
                </div>
                <!--Card-->
    
              </div>
              <!--Fourth column-->
    
            </div>
            <!--Grid row--> --}}
    
    </section>
    <!--Section: Products v.3-->
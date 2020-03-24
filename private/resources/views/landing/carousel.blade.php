@php
    $nG = 1;
    $gallery = DB::table('z_gallery')->get();
@endphp
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
        @foreach ($gallery as $a )
        <li data-target="#carousel-example-2" data-slide-to="{{$nG++}}"></li>
        @endforeach
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="view">
                <img class="d-block w-100 jarallax-img" src="/assets/img/PolyBack.png">
                <div class="mask rgba-black-light"></div>
            </div>
            <div class="carousel-caption carousel-caption-a text-center white-text mx-5 wow fadeIn">
                    <div class="d-none d-md-block">
                      <br><br>
                    </div>
                    <h1 class="mb-4" style="">
                      <strong>Portal PKBL PT Len Industri</strong>
                    </h1>
                    <div class="d-sm-none">
                      <p>
                        <strong>Informasi Mengenai PKBL PT Len Industri dan produk - produk mitra binaan PT Len Industri</strong>
                      </p>
                    </div>
                    <div class="d-none d-md-block smooth-scroll">
                      <p class="mb-4">
                        <strong>Selamat datang di Portal PKBL PT Len Industri, web ini berisi informasi mengenai PKBL PT Len Industri dan produk - produk mitra binaan PT Len Industri</strong>
                      </p>
                      <a href="#product" class="btn btn-outline-white btn-lg ">Jelajahi Lebih Lanjut
                      </a>
                    </div>

            </div>
          
        </div>
        @foreach ($gallery as $gal)
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img class="d-block w-100" src="{{$gal->img}}" alt="{{$gal->title}}">
                <div class="mask rgba-black-strong"></div>
            </div>
            <div class="carousel-caption carousel-caption-b">
              <div class="card" style="background: rgba(0,0,0,0.333)">
                <div class="card-body">
                  <h3 class="h3-responsive">{{$gal->title}}</h3>
                  <p>{{$gal->description}}</p>
                </div>
              </div>
            </div>
        </div>
        @endforeach

    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
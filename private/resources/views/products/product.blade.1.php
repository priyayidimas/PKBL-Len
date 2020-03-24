
@extends('t_index')
@section('content')
@section('head')
<style>
  .carousel-thumbnails .carousel-indicators {
    margin-bottom: -2.5rem;
    position: absolute;
}
.carousel-item img {
    max-height: 455px
  }
@media(max-width:992px){
  .carousel-item img {
    max-height: 230px !important
  }
}

.ind {
  max-height: 75px
}
</style>
@endsection
@include('navbar')
<main class="mt-5 pt-4">
  <div class="container dark-grey-text mt-5">

    <!--Grid row-->
    <div class="row wow fadeIn">

      <!--Grid column Carousel-->
      <div class="col-md-6 mb-4">

       <!--Carousel Wrapper-->
        <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel" data-interval="">
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
        <!--/.Carousel Wrapper-->

      </div>
      <!--Grid column-->

      <!--Grid column Contact-->
      <div class="col-md-6 mb-4">

        <!--Content-->
        <div class="p-4">

          <div class="mb-3">
            <a href="">
              <span class="badge purple mr-1">Category 2</span>
            </a>
            <a href="">
              <span class="badge blue mr-1">New</span>
            </a>
            <a href="">
              <span class="badge red mr-1">Bestseller</span>
            </a>
          </div>

          <h4>{{$product->title}}</h4>
          <hr>
          <h5>Rp. {{number_format($product->harga)}},-</h5>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolor suscipit libero eos atque quia ipsa sint voluptatibus!
            Beatae sit assumenda asperiores iure at maxime atque repellendus maiores quia sapiente.</p>

          <form class="d-flex justify-content-left">
            <!-- Default input -->
            <input type="number" value="1" aria-label="Search" class="form-control" style="width: 100px">
            <button class="btn btn-primary btn-md my-0 p" type="submit">Add to cart
              <i class="fa fa-shopping-cart ml-1"></i>
            </button>

          </form>

        </div>
        <!--Content-->

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

    <hr>

    <!--Grid row Description-->
    <div class="row d-flex justify-content-center wow fadeIn">

      <!--Grid column-->
      <div class="col-md-6 text-center">

        <h4 class="my-4 h4">Additional information</h4>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta odit voluptates,
          quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

    <!--Grid row-->
    <div class="row wow fadeIn">

      <!--Grid column-->
      <div class="col-lg-4 col-md-12 mb-4">

        <img src="{{url('/assets/img/desert.jpg')}}" class="img-fluid" alt="">

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 col-md-6 mb-4">

        <img src="{{url('/assets/img/desert.jpg')}}" class="img-fluid" alt="">

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 col-md-6 mb-4">

        <img src="{{url('/assets/img/desert.jpg')}}" class="img-fluid" alt="">

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

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
@extends('t_index') @section('head')
<style type="text/css">
  @media(min-width:992px){
    .carousel {
      height: 90vh;
      font-family: "Lato";
    }    
  }
  .card-img-top {
        height: 255px;
    }
  .navbar {
    font-family: "Raleway", "Roboto";
    background-color: rgba(0, 0, 0, 0.1);
  }

  .fex {
    position: absolute;
    height: calc(100vh);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 997;
    top: 0;
    width: 100%;
  }

  .mast img{
    max-height: 355px;
    width: 100%
  }

  @media (max-width: 740px) {

  }

  @media (min-width: 800px) and (max-width: 850px) {
    html,
    body,
    header,
    .carousel {
      height: 100vh;
    }
  }

  @media (min-width: 800px) and (max-width: 850px) {
    .navbar:not(.top-nav-collapse) {
      /* background: #004989 !important; */
      background: rgb(0, 77, 141);
       !important;
    }
  }
</style>
@endsection @section('content')
<header>
  @include('navbar') @include('landing.carousel')
</header>
<main>
<div class="container"><br>
    <div class="divider">
        <span id="product"><h5>Produk Mitra Binaan Terbaru</h5></span>
    </div>
    @include('landing.product')
    <div class="divider">
        <span><h5>Artikel terbaru</h5></span>
    </div>
    @include('landing.artikel')
    
    {{-- <a class="btn btn-danger" onclick="toastr.error('Hi! I am error message.');">Error message</a> --}}

</div>
</main>
@include('footer')
@endsection @section('script')
<script src="{{url('/assets/js/clamp.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('.mdb-select').material_select(); 
    $('.jarallax').jarallax({
      speed: 0.2
    }); 
    var module = document.getElementById("truncate");
    $clamp(module, {clamp: 3});
    var module1 = document.getElementById("truncate1");
    $clamp(module1, {clamp: 3});
});
</script>
@endsection
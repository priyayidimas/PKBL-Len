@extends('t_index')
@section('head')
    <link href="{{url('/assets/css/jeffry.in.slider.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="slider slider1" style="">
    <div class="slides">
        <div class="slide-item item1">
        </div>
        <div class="slide-item item2"> 
        </div>
        <div class="slide-item item3">
        </div>
        <div class="slide-item item4">
        </div>
    </div>
</div>
<h5>Hush Antai</h5>
@endsection
@section('script')
<script src="{{url('/assets/js/jquery.glide.min.js')}}"></script>
    <script>
    $('.slider').glide({
        autoplay: false,
        arrowsWrapperClass: 'slider-arrows',
        arrowRightText: '',
        arrowLeftText: ''
    });
</script>
@endsection
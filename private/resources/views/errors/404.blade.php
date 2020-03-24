@extends('t_index')
@section('content')
@include('navbar')
<main class="mt-5 pt-4">
<div class="container mt-5 pt-4">
    <div class="row">
        <div class="col-md-6">
            <img src="{{url('/assets/img/404.png')}}" alt="" srcset="" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3>Oops! Halaman Yang Anda Cari Tidak Ada</h3><br>
            <h5>Silakan Kembali Ke Halaman Sebelumnya</h5>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</main>
@include('footer')
@endsection
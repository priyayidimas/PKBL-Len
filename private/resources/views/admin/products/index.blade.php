@php
    $products = DB::table('z_product')->orderBy("published_at","DESC")->orderBy("created_at","Desc")->get();
    $n = 1;
@endphp
@extends('t_index')
@section('head')
    <link rel="stylesheet" href="{{url('/assets/css/adminstyle.css')}}">
    <link href="/assets/css/addons/datatables.min.css" rel="stylesheet">    
    <script>
    $(document).ready(function () {
        var seg = "#{{Request::segment(2)}}";
        $(seg).addClass("active");
    });
    </script>
@endsection
@section('content')
@include('admin.navbar')
<main class="pt-5 mx-lg-2">
    <div class="container-fluid mt-5">
            <div class="bc-icons wow fadeIn z-depth-1-half">
                <ol class="breadcrumb white text-blue">
                    <li class="breadcrumb-item"><a class="text-blue" href="{{url('')}}">Homepage</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>
                    <li class="breadcrumb-item"><a class="text-blue" href="{{url('/admin')}}">Dashboard</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>
                    <li class="breadcrumb-item active">Produk</li>
                </ol>
            </div>
            @if (Session::has('msg'))
            <div id="card-alert" class="card {{Session::get('color')}} mb-2">
              <div class="card-content white-text">
                  {{Session::get('msg')}}
              </div>
              <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
            </div>
            @endif
            <div class="card mb-4 text-left">
                <div class="card-body">
                    <h5>Produk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary btn-sm" href="{{url('/admin/products/add')}}"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Tambah</a></h5>
                </div>
            </div>
            <div class="card mb-4 wow fadeIn">
                <div class="card-body">
                    <table id="table" class="table-striped table-bordered table-sm" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Nama PK</th>
                                <th>Kategori</th>
                                <th>Published</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)
                            @php
                                $curCat = DB::table('z_trans_product_cat')->where('product_id','=',$p->id)->get();  
                                $mitra = DB::table('usaha')->where('id','=',$p->usaha_id)->first()->nama;                              
                            @endphp
                                <tr>
                                    <td>{{$n++}}</td>
                                    <td><a href="{{url('/admin/products/edit/'.$p->slug)}}"><b>{{$p->title}}</b></a></td>
                                    <td>{{$mitra}}</td>
                                    <td>
                                    @foreach ($curCat as $c)
                                    @php
                                        $cate = DB::table('z_product_cat')->where('id','=',$c->category_id)->first();
                                    @endphp
                                    <a href="{{url('products/category/'.$cate->slug)}}">{{$cate->title}}</a>,
                                    @endforeach
                                    </td>
                                    <td>{{Carbon::parse($p->created_at)->format('d/m/Y')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</main>
@endsection
@section('script')
<script type="text/javascript" src="/assets/js/addons/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            pageLength: 10
        });
        new WOW().init();
        $("#card-alert .close").click(function() {
            $(this).closest('#card-alert').fadeOut('slow');
        });
    });
</script>
@endsection

@php
    $blog = DB::table('z_blog')->orderBy("published_at","DESC")->get();
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
                    <li class="breadcrumb-item active">Artikel</li>
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
                    <h5>Artikel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary btn-sm waves-effect" href="{{url('/admin/blog/add')}}"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Tambah</a></h5>
                </div>
            </div>
            <div class="card mb-4 wow fadeIn">
                <div class="card-body">
                    <table id="table" class="table-striped table-bordered table-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tag</th>
                                <th>Published</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blog as $b)
                            @php
                                $curCat = DB::table('z_trans_blog_cat')->where('blog_id','=',$b->id)->get();                                
                                $curTag = DB::table('z_trans_blog_tag')->where('blog_id','=',$b->id)->get();                                
                            @endphp
                                <tr>
                                    <td>{{$n++}}</td>
                                    <td><a href="{{url('/admin/blog/edit/'.$b->slug)}}"><b>{{$b->title}}</b></a></td>
                                    <td>
                                        @foreach ($curCat as $c)
                                            @php
                                                $cate = DB::table('z_blog_cat')->where('id','=',$c->category_id)->first();
                                            @endphp
                                            <a href="{{url('blog/category/'.$cate->slug)}}">{{$cate->title}}</a>,
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($curTag as $t)
                                            @php
                                                $tag = DB::table('z_blog_tag')->where('id','=',$t->tag_id)->first();
                                            @endphp
                                            <a href="{{url('blog/category/'.$tag->slug)}}">{{$tag->title}}</a>,
                                        @endforeach
                                    </td>
                                    <td>{{Carbon::parse($b->published_at)->format('d/m/Y')}}</td>
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

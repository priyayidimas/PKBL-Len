@php
    $tagAll = DB::table('z_blog_tag')->get();
@endphp
@extends('t_index')
@section('head')
    <link rel="stylesheet" href="{{url('/assets/css/adminstyle.css')}}">
    <link href="/assets/css/addons/datatables.min.css" rel="stylesheet">
    <script src="{{url('/assets/js/currency.js')}}"></script>
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";        
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
                <li class="breadcrumb-item"><a class="text-blue" href="{{url('/admin/products')}}">Blog</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>
                <li class="breadcrumb-item active">Tag</li>
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
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">Tambah Tag</div>
                    <div class="card-body">
                        <form action="{{url('/addBlogTag')}}" method="post">
                            {!!csrf_field()!!}
                            <div class="md-form">
                                <input type="text" id="target" class="form-control" name="title" placeholder=" " required>
                                <label for="materialLoginFormEmail">Nama</label>
                            </div>
                            <br>
                            <div class="md-form">
                                <textarea name="deskripsi" id="target" class="md-textarea form-control" placeholder=" "></textarea>
                                <label for="materialLoginFormEmail">Deskripsi</label>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect">Submit</button>
                        </form>
                    </div>
                </div>
            </div>    
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Daftar Tag</div>
                    <div class="card-body">
                        <table id="table" class="table-striped table-bordered table-sm" width="100%">
                            <thead>
                                <tr>
                                    <td>Nama</td>
                                    <td>Deskripsi</td>
                                    <td>Slug</td>
                                    <td>Jumlah</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tagAll as $ct)
                                    <tr>
                                        <td>{{$ct->title}}</td>
                                        <td>{{$ct->description}}</td>
                                        <td>{{$ct->slug}}</td>
                                        <td><a href="{{url('/blog/tag/'.$ct->slug)}}" target="_blank">{{DB::table('z_trans_blog_tag')->where('tag_id','=',$ct->id)->count()}}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    
        </div>            

    </div>
</main>
<div class="nothing-just-modal">
    <div id="modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Tag</h5>
            <button type="button" class="close float-right" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body m-2 ml-3">
            
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="/assets/js/addons/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            pageLength: 10
        });
        $(".mdb-select").material_select();
        $("#card-alert .close").click(function() {
            $(this).closest('#card-alert').fadeOut('slow');
        });
        $('#modal').on('show.bs.modal', function(ev) {
            var modal = $(this);
            var link = $(ev.relatedTarget);
            var id = link.data('content');
            modal.find('.modal-body').load('/editBlogTag/' + id);
        });    
    });
</script>
@endsection
@php
    $gallery = DB::table('z_gallery');
    $n = 1;
@endphp
@extends('t_index')
@section('head')
    <link rel="stylesheet" href="{{url('/assets/css/adminstyle.css')}}">
    <link href="/assets/css/addons/datatables.min.css" rel="stylesheet">    
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
                    <li class="breadcrumb-item active">Galeri</li>
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
                    <h5>Galeri 
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary btn-sm waves-effect" data-toggle="modal" href="#addGallery"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Tambah Galeri</a>
                    </h5>
                </div>
            </div>
            <div class="card mb-4 wow fadeIn">
                <div class="card-body">
                    <table id="table" class="table-striped table-bordered table-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Thumbnail</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($gallery->count() > 0)
                            @foreach ($gallery->get() as $gal)
                                <tr>
                                    <td>{{$n++}}</td>
                                    <td><a href="#editGallery" data-toggle="modal" data-content="{{Crypt::encryptString($gal->id)}}">{{$gal->title}}</a></td>
                                    <td>{{$gal->description}}</td>
                                    <td><img src="{{$gal->img}}" class="img-thumbnail" style="height: 75px" alt=""></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">Tidak Ada Data</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</main>
<div class="nothing-just-modal">
    <div id="addGallery" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Tambah Galeri</h5>
            <button type="button" class="close float-right" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body m-2 ml-3">
                    <form class="" action="{{URL::to('/addGallery')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="file-field">
                            <div class="mb-2 mx-auto" style="text-align:center">
                                <img id="holder" class="img-thumbnail z-depth-1-half">
                            </div>
                            <div class="d-flex justify-content-center">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary btn-sm btn-rounded float-left">Add photo
                                </a>
                                <input type="hidden" name="img" id="thumbnail">
                            </div>
                        </div>
                        <div class="md-form">
                            <input type="text" class="form-control" name="title" placeholder=" " required>
                            <label for="materialLoginFormEmail" class="active">Judul</label>
                        </div>
                        <div class="md-form">
                            <input type="text" class="form-control" name="description" placeholder=" ">
                            <label for="materialLoginFormEmail" class="active">Deskripsi</label>
                        </div>
            </div>
            <div class="modal-footer">
                        <button type="submit" class="btn green waves-effect waves-light">Submit</button>
                        <button type="button" class="btn btn-flat waves-effect" data-dismiss="modal">Cancel</button>
                    </form>                    
            </div>
        </div>
        </div>
    </div>
    <div id="editGallery" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Galeri</h5>
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
<script src="{{url('/assets/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('/assets/ckeditor/adapters/jquery.js')}}"></script>
<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
</script>
<script>
    $(document).ready(function () {
        new WOW().init();
        $('#lfm').filemanager('image', {prefix: route_prefix});
        $('#lfm1').filemanager('image', {prefix: route_prefix});
        var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      };
        $("#card-alert .close").click(function() {
            $(this).closest('#card-alert').fadeOut('slow');
        });
        $("select").material_select();
        $("#editGallery").on('show.bs.modal', function (ev) {
            var modal = $(this);
            var link = $(ev.relatedTarget);
            var id = link.data('content');
            modal.find('.modal-body').load('/editGallery/' + id);
        });
    });
</script>
@endsection

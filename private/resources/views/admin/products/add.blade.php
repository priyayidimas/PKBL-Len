@php
    $usaha = DB::table('usaha')->get();
    $cat = DB::table('z_product_cat')->where('parent_id','=',null)->get();
@endphp
@extends('t_index')
@section('head')
    <link rel="stylesheet" href="{{url('/assets/css/adminstyle.css')}}">
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
                    <li class="breadcrumb-item"><a class="text-blue" href="{{url('/admin/products')}}">Produk</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>
                    <li class="breadcrumb-item active">Tambah Produk</li>
                </ol>
            </div>
        
                <div class="row">
                    <div class="col-lg">
                        <div class="card">
                            <div class="card-body">
                              <form action="{{url('/addProduct')}}" method="POST">
                                {!!csrf_field()!!}
                                <div class="row">
                                        <div class="col-lg-6">
                                                <div class="md-form">
                                                        <input type="text" id="target" class="form-control" placeholder=" " name="title" required>
                                                        <label for="materialLoginFormEmail">Nama Produk</label>
                                                </div>
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="md-form">
                                                    <input type="text" class="form-control currency" placeholder=" " name="harga" required>
                                                    <label for="materialLoginFormEmail">Harga (Rp.)</label>
                                                </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                            {{-- <div class="md-form">
                                                <input type="text" class="form-control" id="mitra" placeholder=" ">
                                                <label for="materialLoginFormEmail">Nama Mitra</label>
                                            </div> --}}
                                            <span>Nama Mitra Binaan</span>
                                            <select id="sel" class="mdb-select colorful-select dropdown-primary" searchable="Cari..." name="usaha_id" required>
                                                <option value="" disabled selected>Pilih Salah Satu</option>
                                                @foreach($usaha as $m)
                                                <option value="{{$m->id}}">{{$m->nama}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-lg-6">
                                            <span>Kategori</span>
                                            <select id="sel" class="mdb-select colorful-select dropdown-primary" name="category_id" required>
                                                <option value="" disabled selected>Pilih Salah Satu</option>
                                                @foreach ($cat as $ct)
                                                <option value="{{$ct->id}}">{{$ct->title}}</option>
                                                @php
                                                    $sub = DB::table('z_product_cat')->where('parent_id','=',$ct->id)->get();
                                                @endphp
                                                @foreach ($sub as $sCat)
                                                    <option value="{{$sCat->id}}">-- {{$sCat->title}}</option>
                                                @endforeach
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span>Deskripsi Produk</span><br>
                                        <textarea name="deskripsi" type="text" id="text2" class="md-textarea md-textarea-auto form-control" rows="3"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Jika Memiliki Sub-Kategori, Cukup Memilih Sub-Kategorinya Saja
                                        </small><br>
                                        <div class="row">
                                            <div class="col lg-3">
                                                <div class="file-field">
                                                    <div class="mb-2 mx-auto" style="text-align:center">
                                                        <img id="holder1" src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" class="rounded-circle z-depth-1-half avatar-pic">
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary btn-sm btn-rounded float-left">Add photo
                                                        </a>
                                                        <input type="hidden" name="foto1" id="thumbnail1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col lg-3">
                                                <div class="file-field">
                                                    <div class="mb-2 mx-auto" style="text-align:center">
                                                        <img id="holder2" src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" class="rounded-circle z-depth-1-half avatar-pic">
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary btn-sm btn-rounded float-left">Add photo
                                                        </a>
                                                        <input type="hidden" name="foto2" id="thumbnail2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col lg-3">
                                                <div class="file-field">
                                                    <div class="mb-2 mx-auto" style="text-align:center">
                                                        <img id="holder3" src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" class="rounded-circle z-depth-1-half avatar-pic">
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <a id="lfm3" data-input="thumbnail3" data-preview="holder3" class="btn btn-primary btn-sm btn-rounded float-left">Add photo
                                                        </a>
                                                        <input type="hidden" name="foto3" id="thumbnail3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col lg-3">
                                                <div class="file-field">
                                                    <div class="mb-2 mx-auto" style="text-align:center">
                                                        <img id="holder4" src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" class="rounded-circle z-depth-1-half avatar-pic">
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <a id="lfm4" data-input="thumbnail4" data-preview="holder4" class="btn btn-primary btn-sm btn-rounded float-left">Add photo
                                                        </a>
                                                        <input type="hidden" name="foto4" id="thumbnail4">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </form>
            

    </div>
</main>
@endsection
@section('script')
<script src="{{url('/assets/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('/assets/ckeditor/adapters/jquery.js')}}"></script>
<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
</script>

<script type="text/javascript">
    // Animations initialization
    new WOW().init();
    $("select").material_select();
    $('#lfm1').filemanager('image', {prefix: route_prefix});
    $('#lfm2').filemanager('image', {prefix: route_prefix});
    $('#lfm3').filemanager('image', {prefix: route_prefix});
    $('#lfm4').filemanager('image', {prefix: route_prefix});
    var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      };
    // var mitra = [
    //     @foreach($usaha as $m)
    //     "{{$m->nama}}",
    //     @endforeach
    // ];
    $('textarea[name=deskripsi]').ckeditor({
        height: 200,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
// $('#mitra').mdb_autocomplete({
//     data: mitra
// });
</script>
@endsection

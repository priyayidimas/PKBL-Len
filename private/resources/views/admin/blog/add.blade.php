@php
    $cat = DB::table('z_blog_cat')->where('parent_id','=',null)->get();
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
<main class="pt-5 mx-lg-2 wow fadeIn">
    <div class="container-fluid mt-5">
            <div class="bc-icons wow fadeIn z-depth-1-half wow fadeIn">
                <ol class="breadcrumb white text-blue">
                    <li class="breadcrumb-item"><a class="text-blue" href="{{url('')}}">Home</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>
                    <li class="breadcrumb-item"><a class="text-blue" href="{{url('/admin')}}">Dashboard</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>
                    <li class="breadcrumb-item"><a class="text-blue" href="{{url('/admin/blog')}}">Artikel</a><i class="fa fa-angle-right mx-2" aria-hidden="true"></i></li>
                    <li class="breadcrumb-item active">Tambah Artikel</li>
                </ol>
            </div>


            <form action="{{url('/addBlog')}}" method="post">
                {!!csrf_field()!!}
                <div class="row wow fadeIn">
                    <div class="col-lg-8">
                        <textarea name="content" id="content"></textarea>    
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-2 text-left wow fadeIn">
                            <div class="card-body">
                                    <div class="md-form">
                                        <input type="text" id="from" class="form-control" placeholder=" " name="title">
                                        <label for="materialLoginFormEmail">Judul</label>
                                    </div>
                                    <div class="md-form">
                                            <input type="text" id="target" class="form-control" placeholder=" " name="slug">
                                            <label for="materialLoginFormEmail">URL</label>
                                    </div>
                                    <div class="md-form">
                                            <div class="input-group">
                                                    <span class="input-group-btn">
                                                      <a id="lfm2" data-input="header" data-preview="holder2" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-picture-o"></i>
                                                      </a>
                                                    </span>
                                                    <input id="header" class="form-control" type="text" name="masthead" placeholder="Header">
                                                     <label for="materialLoginFormEmail">Header</label>                                                    
                                                  </div>
                                                  <img id="holder2" style="margin-top:15px;max-height:100px;">
                                    </div>
                                    <div>
                                        <span>Kategori</span>
                                        <select name="category[]" class="mdb-select colorful-select dropdown-primary" multiple searchable="Search here..">
                                            <option value="" disabled selected>-- Pilih Kategori --</option>
                                            @foreach ($cat as $ct)
                                                <option value="{{$ct->id}}">{{$ct->title}}</option>
                                            @php
                                                $sub = DB::table('z_blog_cat')->where('parent_id','=',$ct->id)->get();
                                            @endphp
                                            @foreach ($sub as $sCat)
                                                <option value="{{$sCat->id}}">--{{$sCat->title}}</option>
                                            @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <span>Tag</span><br>
                                        <div class="chips chips-placeholder"></div>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Tekan Enter Untuk Menambah Tag
                                        </small>
                                    </div>
                                    <div class="md-form">
                                            <input type="text" id="tags" class="form-control" placeholder=" " name="tags">
                                            <label for="materialLoginFormEmail">TAGS</label>
                                    </div>
                                </div>
                                <div class="row text-center mb-4">
                                    <div class="col-md-6">
                                        <button type="button" id="btnprev" class="btn btn-success waves-effect">Preview</button>                                    
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary waves-effect">Submit</button>                                    
                                    </div>
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
  $('textarea[name=content]').ckeditor({
    height: 500,
    filebrowserImageBrowseUrl: route_prefix + '?type=Files',
    filebrowserImageUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}',
    filebrowserBrowseUrl: route_prefix + '?type=Files',
    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
  });
  $('#lfm2').filemanager('file', {prefix: route_prefix});
    var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      };
</script>
<script type="text/javascript">
    new WOW().init();
    $(document).ready(function () {
        $('.mdb-select').materialSelect();    
        $('.chips-placeholder').materialChip({
            placeholder: 'Enter a tag',
            secondaryPlaceholder: 'Tag',
        });

        var data= $('.chips').material_chip('data');
        $('.chips').on('chip.add', function(e, chip){
            var OPO = "";
            for (let index = 0; index < data.length; index++) {
                OPO = OPO + data[index].tag + ",";
            }
            $("#tags").val(OPO); 
        });
        $('.chips').on('chip.delete', function(e, chip){
            var OPO = "";
            for (let index = 0; index < data.length; index++) {
                OPO = OPO + data[index].tag + ",";
            }
            $("#tags").val(OPO);          
        });
        $('#btnprev').click( function () {
            var contents = $('#content').val();
            var mywin = window.open("{{url('/assets/preview.html')}}", "ckeditor_preview", "location=0,status=0");    
            mywin.con = contents;
        });
        
    });
</script>
@endsection

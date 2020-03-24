@php
    $page = DB::table('z_page');
    $blog = DB::table('z_blog')->get();
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
                    <li class="breadcrumb-item active">Halaman</li>
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
                    <h5>Halaman 
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary btn-sm waves-effect" data-toggle="modal" href="#addMenu"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Tambah Menu</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info btn-sm waves-effect" data-toggle="modal" href="#addPage"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Tambah Halaman</a>
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
                                <th>Artikel</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($page->count() > 0)
                            @foreach ($page->get() as $p)
                            @if ($p->blog_id == null)
                                <tr>
                                    <td></td>
                                    <td>{{$p->title}}</td>
                                    <td>-</td>
                                    <td style="width:7%">
                                        <a id="apa" data-toggle="modal" href="#addMenuPage" data-id="{{$p->id}}" class="text-success pr-2"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        <a href="#editMenu" data-toggle="modal" data-content="{{Crypt::encryptString($p->id)}}" class="text-warning pr-2 editMenu" data-content="{{$p->id}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @php
                                    $pageMenu = DB::table('z_page')->where('page_id','=',$p->id)->get();
                                @endphp
                                @foreach ($pageMenu as $pm)
                                @php
                                    $blogo = DB::table('z_blog')->where('id','=',$pm->blog_id)->first();
                                @endphp
                                    <tr>
                                        <td>{{$n++}}</td>
                                        <td style="padding-left: 3%">{{$pm->title}}</td>
                                        <td><a href="{{url('/admin/blog/edit/'.$blogo->slug)}}" target="_blank">{{$blogo->title}}</a></td>
                                        <td style="width:7%">
                                            <a href="#editPage" data-toggle="modal" data-content="{{Crypt::encryptString($pm->id)}}" class="text-warning pr-2"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @elseif($p->page_id == null)
                            @php
                                $bloga = DB::table('z_blog')->where('id','=',$p->blog_id)->first();
                            @endphp
                                <tr>
                                    <td>{{$n++}}</td>
                                    <td>{{$p->title}}</td>
                                    <td><a href="{{url('/admin/blog/edit/'.$bloga->slug)}}" target="_blank">{{$bloga->title}}</a></td>
                                    <td>
                                        <a href="#editPage" data-toggle="modal" data-content="{{Crypt::encryptString($p->id)}}" class="text-warning pr-2"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endif
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
    <div id="addPage" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Tambah Halaman</h5>
            <button type="button" class="close float-right" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body m-2 ml-3">
                    <form class="" action="{{URL::to('/addPage')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="md-form">
                            <input type="text" id="target" class="form-control" name="title" placeholder=" " required>
                            <label for="materialLoginFormEmail" class="active">Nama</label>
                        </div>
                        {{-- <div class="md-form">
                            <input type="text" id="blog" class="form-control" name="title" placeholder=" " required>
                            <label for="materialLoginFormEmail" class="active">Artikel</label>
                        </div> --}}
                        <span>Artikel</span>
                        <select id="sel" class="mdb-select colorful-select dropdown-primary" searchable="Cari..." name="blog_id">
                            <option value="" disabled selected>Pilih Salah Satu</option>
                            @foreach($blog as $b)
                            <option value="{{$b->id}}">{{$b->title}}</option>
                            @endforeach
                        </select>

            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn green waves-effect waves-light">Submit</button>
                    <button type="button" class="btn btn-flat waves-effect" data-dismiss="modal">Cancel</button>
                </form>                    
            </div>
        </div>
        </div>
    </div>
    <div id="addMenu" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Tambah Menu</h5>
            <button type="button" class="close float-right" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body m-2 ml-3">
                    <form class="" action="{{URL::to('/addMenu')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="md-form">
                            <input type="text" id="target" class="form-control" name="title" placeholder=" " required>
                            <label for="materialLoginFormEmail" class="active">Nama</label>
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
    <div id="addMenuPage" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Tambah Halaman</h5>
            <button type="button" class="close float-right" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body m-2 ml-3">
                    <form class="" action="{{URL::to('/addPage')}}" method="post">
                        {!! csrf_field() !!}
                        <input type="hidden" name="page_id" id="page_id">
                        <div class="md-form">
                            <input type="text" id="target" class="form-control" name="title" placeholder=" " required>
                            <label for="materialLoginFormEmail" class="active">Nama</label>
                        </div>
                        <span>Artikel</span>
                        <select id="sel" class="mdb-select dropdown-primary" searchable="Cari..." name="blog_id">
                            <option value="" disabled selected>Pilih Salah Satu</option>
                            @foreach($blog as $b)
                            <option value="{{$b->id}}">{{$b->title}}</option>
                            @endforeach
                        </select>
            </div>
            <div class="modal-footer">
                        <button type="submit" class="btn green waves-effect waves-light">Submit</button>
                        <button type="button" class="btn btn-flat waves-effect" data-dismiss="modal">Cancel</button>
                    </form>                    
            </div>
        </div>
        </div>
    </div>
    <div id="editMenu" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Menu</h5>
                  <button type="button" class="close float-right" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body m-2 ml-3">
                  
                </div>
              </div>
            </div>
    </div>
    <div id="editPage" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Page</h5>
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
        new WOW().init();
        $("#card-alert .close").click(function() {
            $(this).closest('#card-alert').fadeOut('slow');
        });
        $("select").material_select();
        $("#addMenuPage").on('show.bs.modal', function (ev) {
            var modal = $(this);
            var link = $(ev.relatedTarget);            
            var id = link.data('id');
            modal.find('#page_id').val(id);
        });
        $("#editMenu").on('show.bs.modal', function (ev) {
            var modal = $(this);
            var link = $(ev.relatedTarget);
            var id = link.data('content');
            modal.find('.modal-body').load('/editMenu/' + id);
        });
        $("#editPage").on('show.bs.modal', function (ev) {
            var modal = $(this);
            var link = $(ev.relatedTarget);
            var id = link.data('content');
            modal.find('.modal-body').load('/editPage/' + id);
        });
        // var blog = [
        //     @foreach($blog as $b)
        //     "{{$b->title}}",
        //     @endforeach
        // ];
        // $('#blog').mdb_autocomplete({
        //     data: blog
        // });
    });
</script>
@endsection

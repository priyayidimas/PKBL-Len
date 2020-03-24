@php
    $page = DB::table('z_page')->where('id','=',$id)->first();
    $blog = DB::table('z_blog')->get();    
@endphp
<script>
    $(document).ready(function () {
        $("select").material_select();
        $("#cur").val("{{$page->blog_id}}");
    });
</script>
<form class="" action="{{URL::to('/updatePage')}}" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="id" value="{{$page->id}}">
    <div class="md-form">
        <input type="text" id="target" class="form-control" name="title" placeholder=" " value="{{$page->title}}" required>
        <label for="materialLoginFormEmail" class="active">Nama</label>
    </div>
    <span>Artikel</span>
    <select id="cur" class="mdb-select colorful-select dropdown-primary" searchable="Cari..." name="blog_id">
        <option value="" disabled selected>Pilih Salah Satu</option>
        @foreach($blog as $b)
        <option value="{{$b->id}}">{{$b->title}}</option>
        @endforeach
    </select>
    
    <button type="submit" class="btn green waves-effect waves-light">Submit</button>
    <button type="button" class="btn red waves-effect" onclick="location.href='{{url('/deletePage/'.Crypt::encryptString($page->id))}}'">Delete</button>
    <button type="button" class="btn btn-flat waves-effect" data-dismiss="modal">Cancel</button>

</form>
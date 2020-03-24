@php
    $curCat = DB::table('z_blog_cat')->where('id','=',$id)->first();
    $cat = DB::table('z_blog_cat')->where('parent_id','=',null)->get();    
@endphp
<script>
    $(document).ready(function () {
        $("select").material_select();
        $("#cur").val("{{$curCat->parent_id}}");
    });
</script>
<form class="" action="{{URL::to('/updateBlogCat')}}" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="id" value="{{$curCat->id}}">
    <div class="md-form">
        <input type="text" id="target" class="form-control" name="title" placeholder=" " required value="{{$curCat->title}}">
        <label for="materialLoginFormEmail" class="active">Nama</label>
    </div>
    <span>Kategori Parent</span>                        
    <select id="cur" name="parent_id" class="mdb-select colorful-select dropdown-primary">
            <option value="" selected>None</option>
            @foreach ($cat as $c)
            <option value="{{$c->id}}">{{$c->title}}</option>
            @endforeach
    </select>
    <div class="md-form">
        <textarea name="deskripsi" id="target" class="md-textarea form-control" placeholder=" ">{{$curCat->description}}</textarea>
        <label for="materialLoginFormEmail" class="active">Deskripsi</label>
    </div>
    
    <button type="submit" class="btn green waves-effect waves-light">Submit</button>
    <button type="button" class="btn red waves-effect" onclick="location.href='{{url('/deleteBlogCat/'.Crypt::encryptString($curCat->id))}}'">Delete</button>
    <button type="button" class="btn btn-flat waves-effect" data-dismiss="modal">Cancel</button>

</form>
@php
    $curTag = DB::table('z_blog_tag')->where('id','=',$id)->first();
    $tag = DB::table('z_blog_tag')->where('parent_id','=',null)->get();    
@endphp
<script>
    $(document).ready(function () {
        $("select").material_select();
    });
</script>
<form class="" action="{{URL::to('/updateBlogTag')}}" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="id" value="{{$curTag->id}}">
    <div class="md-form">
        <input type="text" id="target" class="form-control" name="title" placeholder=" " required value="{{$curTag->title}}">
        <label for="materialLoginFormEmail" class="active">Nama</label>
    </div>
    <div class="md-form">
        <textarea name="deskripsi" id="target" class="md-textarea form-control" placeholder=" ">{{$curTag->description}}</textarea>
        <label for="materialLoginFormEmail" class="active">Deskripsi</label>
    </div>
    
    <button type="submit" class="btn green waves-effect waves-light">Submit</button>
    <button type="button" class="btn red waves-effect" onclick="lotagion.href='{{url('/deleteBlogTag/'.Crypt::encryptString($curTag->id))}}'">Delete</button>
    <button type="button" class="btn btn-flat waves-effect" data-dismiss="modal">Cancel</button>

</form>
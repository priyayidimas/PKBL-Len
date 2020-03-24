@php
    $blog = DB::table('z_blog')->where('id','=',$id)->first();
@endphp
<form class="" action="{{URL::to('/deleteBlog')}}" method="post">
    {!! csrf_field() !!}
    <div class="row">
        <p>Artikel dengan Judul "{{$blog->title}}" Akan terhapus.</p>
        <p> Apakah anda yakin ?</p>
        <input type="hidden" name="id" value="{{ $blog->id }}">
    </div>
    
    <button type="submit" class="btn red waves-effect waves-light">Yes</button>
    <button type="button" class="btn btn-flat waves-effect" data-dismiss="modal">No</button>

</form>
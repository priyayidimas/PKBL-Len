@php
    $gal = DB::table('z_gallery')->where('id','=',$id)->first();
@endphp
<script>
    var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";        
</script>
<form class="" action="{{URL::to('/updateGallery')}}" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="id" value="{{$gal->id}}">
        <div class="file-field">
            <div class="mb-2 mx-auto" style="text-align:center">
                <img id="holder1" src="{{$gal->img}}" class="img-thumbnail z-depth-1-half">
            </div>
            <div class="d-flex justify-content-center">
                <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary btn-sm btn-rounded float-left">Add photo
                </a>
                <input type="hidden" name="img" id="thumbnail1">
            </div>
        </div>
        <div class="md-form">
            <input type="text" class="form-control" name="title" placeholder=" " value="{{$gal->title}}" required>
            <label for="materialLoginFormEmail" class="active">Judul</label>
        </div>
        <div class="md-form">
            <input type="text" class="form-control" name="description" value="{{$gal->description}}" placeholder=" ">
            <label for="materialLoginFormEmail" class="active">Deskripsi</label>
        </div>
    
        <button type="button" class="btn red waves-effect float-left" onclick="location.href='{{url('/deleteGallery/'.Crypt::encryptString($gal->id))}}'">Delete</button>
    <button type="submit" class="btn green waves-effect waves-light">Submit</button>
    <button type="button" class="btn btn-flat waves-effect" data-dismiss="modal">Cancel</button>

</form>
<script>
        $('#lfm1').filemanager('image', {prefix: route_prefix});
        var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      };
</script>
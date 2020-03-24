@php
    $page = DB::table('z_page')->where('id','=',$id)->first();
@endphp
<form class="" action="{{URL::to('/updatePage')}}" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="id" value="{{$page->id}}">
    <div class="md-form">
        <input type="text" id="target" class="form-control" name="title" placeholder=" " value="{{$page->title}}" required>
        <label for="materialLoginFormEmail" class="active">Nama</label>
    </div>
    
    <button type="submit" class="btn green waves-effect waves-light">Submit</button>
    <button type="button" class="btn red waves-effect" onclick="location.href='{{url('/deletePage/'.Crypt::encryptString($page->id))}}'">Delete</button>
    <button type="button" class="btn btn-flat waves-effect" data-dismiss="modal">Cancel</button>

</form>
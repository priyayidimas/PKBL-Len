@extends('t_index')
@section('head')
<script>
    var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
</script>
@endsection
@section('content')
    <textarea name="ce"></textarea>
@endsection
@section('script')
<script src="{{url('/assets/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('/assets/ckeditor/adapters/jquery.js')}}"></script>
<script>
  $('textarea[name=ce]').ckeditor({
    height: 100,
    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
    filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: route_prefix + '?type=Files',
    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
  });
</script>
@endsection
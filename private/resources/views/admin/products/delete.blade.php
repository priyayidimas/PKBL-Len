@php
    $product = DB::table('z_product')->where('id','=',$id)->first();
    $mitra = DB::table('usaha')->where('id','=',$product->usaha_id)->first();
@endphp
<form class="" action="{{URL::to('/deleteProduct')}}" method="post">
    {!! csrf_field() !!}
    <div class="row">
        <p>Produk "{{$product->title}}" dati "{{$mitra->nama}}" Akan terhapus.</p>
        <p> Apakah anda yakin ?</p>
        <input type="hidden" name="id" value="{{ $product->id }}">
    </div>
    
    <button type="submit" class="btn red waves-effect waves-light">Yes</button>
    <button type="button" class="btn btn-flat waves-effect" data-dismiss="modal">No</button>

</form>
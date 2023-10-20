
@php
    
if($type === 'shops'){
$path='storage/shops/';
}
if($type === 'product'){
$path='storage/product/';
}

@endphp

<div>
    @if (empty($filename))
        <img src="{{asset('images/noimage-760x460.png')}}" alt="画像なし">
    @else
    <img src="{{asset($path . $filename)}}" >
    @endif
</div>
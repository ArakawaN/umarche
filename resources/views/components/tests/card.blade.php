
@props(['content'=>'初期値です','image'=>'初期画像','title'=>''])

<div {{$attributes->merge([
    "class"=>"border-2 shadow-md w-1/4 p-2"
    ])}} >
<div>{{$title}} </div>
<div>{{$image}} </div>
<div>{{$content}} </div>

</div>
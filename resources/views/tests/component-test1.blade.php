
<x-tests.app>
<x-slot name='header'>
    haeder1
</x-slot>
    component1

    <x-tests.card title="タイトル1" image='画像1' content='本文1'></x-tests.card>
    <x-tests.card :title="$title" :image='$image' :content='$content'></x-tests.card>
    <x-tests.card title='タイトルs'  />
    <x-tests.card title='CSSを変えたい' class='bg-red-100'/>

</x-tests.app>

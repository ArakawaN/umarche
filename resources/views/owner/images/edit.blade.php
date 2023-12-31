<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <form action="{{route('owner.images.update',['image'=>$image->id])}}"  method="POST">
                    @csrf
                    @method('put')

                    <div class="-m-2">

                        
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                          <label for="title" class="leading-7 text-sm text-gray-600">画像</label>
                          <input type="text" id="title" name="title" title="{{$image->title}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                      </div>

                      <div class="p-2 w-1/2 mx-auto">
                        <div class="relative" >
                        <x-thumbnail :filename="$image->filename" type="product" />
                        </div>
                      </div>

                      <div class="flex justify-around p-2 w-full">
                        <button type="button" onclick="location.href='{{route('owner.images.index')}}'" class="text-white bg-yellow-400 border-0  py-2 px-8 focus:outline-none hover:bg-yellow-500 rounded text-lg">戻る</button>
                        <button type="submit" class="text-white bg-indigo-400 border-0  py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                      </div>

                    </div>

                </form>     

                <div class="p-6 text-gray-900">

                <form id="delete_{{$image->id}}" action="{{route('owner.images.destroy',['image'=>$image->id])}}" method="POST" >
                    @csrf
                    @method('delete')
                  <div class="md:px-4 py-3 text-center ">
                    <a data-id="{{$image->id}}" href="#" onclick="deletePost(this)" class="text-white bg-red-400 border-0  py-2 px-6 focus:outline-none hover:bg-red-500 rounded ">削除する</a>
                  </div>
                </form>

                </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deletePost(e){
            'use strick';
            if(confirm('本当に削除していいですか？')){
                document.getElementById('delete_'+e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>

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
                    
                <form action="{{route('owner.shops.update',['shop'=>$shop->id])}}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="-m-2">

                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">店名</label>
                          <input type="text" id="name" name="name" value="{{$shop->name}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                      </div>

                      <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                          <label for="information" class="leading-7 text-sm text-gray-600">店名</label>
                          <textarea type="text" id="information" name="information"  required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$shop->information}}</textarea>
                          <x-input-error :messages="$errors->get('information')" class="mt-2" />
                        </div>
                      </div>

                      <div class="p-2 w-1/2 mx-auto">
                        <div class="relative" >
                        <x-thumbnail :filename="$shop->filename" type="shops" />
                        </div>
                      </div>

                    
                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                          <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                          <input type="file" id="image" name="image" accept="image/png,image/jpeg,image/jpg" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                      </div>


                      <div class="p-3 w-1/2 mx-auto">
                        <div class="relative flex ">
                            <div class="mr-2 justy-center ">
                                <input type="radio" id="is_selling" name="is_selling" value="1" @checked($shop->is_selling ===1) class="mr-2" >販売中
                            </div>
                            <div>
                             <input type="radio" id="is_selling" name="is_selling" value="2" @checked($shop->is_selling ===2) class="mr-2" >停止中
                            </div>
                        
                          <x-input-error :messages="$errors->get('is_selling')" class="mt-2" />
                        </div>
                      </div>

                      <div class="flex justify-around p-2 w-full">
                        <button type="button" onclick="location.href='{{route('owner.shops.index')}}'" class="text-white bg-yellow-400 border-0  py-2 px-8 focus:outline-none hover:bg-yellow-500 rounded text-lg">戻る</button>
                        <button type="submit" class="text-white bg-indigo-400 border-0  py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                      </div>

                    </div>

                </form>     

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

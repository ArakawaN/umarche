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
                    
                <form action="{{route('owner.products.store')}}" method="POST">
                    @csrf

                    <div class="-m-2">
                        

                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                              <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                              <input type="text" id="name" name="name" value="{{old('name')}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                          </div>
    
                          <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                              <label for="information" class="leading-7 text-sm text-gray-600">商品情報</label>
                              <textarea type="text" id="information" name="information"  required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{old('information')}}</textarea>
                              <x-input-error :messages="$errors->get('information')" class="mt-2" />
                            </div>
                          </div>

                          <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                              <label for="price" class="leading-7 text-sm text-gray-600">価格</label>
                              <input type="number" id="price" name="price" value="{{old('price')}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                          </div>

                          <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                              <label for="quantity" class="leading-7 text-sm text-gray-600">初期在庫</label>
                              <input type="number" id="quantity" name="quantity" value="{{old('quantity')}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                <span class="text-sm" >0~99の範囲で入力してください</span>
                            </div>
                          </div>

                          <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                              <label for="sort_order" class="leading-7 text-sm text-gray-600">表示順</label>
                              <input type="number" id="sort_order" name="sort_order" value="{{old('sort_order')}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              <x-input-error :messages="$errors->get('sort_order')" class="mt-2" />
                            </div>
                          </div>

                          <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="shop_id" class="leading-7 text-sm text-gray-600">販売店舗</label>
                                <select id="shop_id" name="shop_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @foreach ($shops as $shop)
                                    <option value="{{$shop->id}}">{{$shop->name}}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('shop_id')" class="mt-2" />
                            </div>
                            </div>
                        

                    <div class="p-2 w-1/2 mx-auto">
                        <div class="relative">
                            <label for="category" class="leading-7 text-sm text-gray-600">カテゴリー</label>
                            <select name="category" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" >

                            @foreach ($categories as $category )
                            <optgroup label="{{$category->name}}" >{{-- PrimaryCategoryを表示 --}}
                                @foreach ($category->secondary as $secondary )
                                    <option value="{{$secondary->id}}">{{$secondary->name}}</option>
                                @endforeach
                            @endforeach

                            </select>


                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                          </div>
                      </div>





                      {{-- <label for="name" class="leading-7 text-sm text-gray-600">店名</label>
                      <input type="text" id="name" name="name" value="{{$shop->name}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    --}}

                    <x-select-image :images="$images" name='image1' />
                    <x-select-image :images="$images" name='image2' />
                    <x-select-image :images="$images" name='image3' />
                    <x-select-image :images="$images" name='image4' />
                    

                    <div class="p-3 w-1/2 mx-auto">
                        <div class="relative flex ">
                            <div class="mr-2 justy-center ">
                                <input type="radio" id="is_selling" name="is_selling" value="1" checked class="mr-2" >販売中
                            </div>
                            <div>
                             <input type="radio" id="is_selling" name="is_selling" value="2" class="mr-2" >停止中
                            </div>
                        
                          <x-input-error :messages="$errors->get('is_selling')" class="mt-2" />
                        </div>
                      </div>



                      <div class="flex justify-around p-2 w-full">
                        <button type="button" onclick="location.href='{{route('owner.products.index')}}'" class="text-white bg-yellow-400 border-0  py-2 px-8 focus:outline-none hover:bg-yellow-500 rounded text-lg">戻る</button>
                        <button type="submit" class="text-white bg-indigo-400 border-0  py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">作成する</button>
                      </div>

                    </div>



                </form>     

                </div>
            </div>
        </div>
    </div>

    <script>
        'use strict'
        const images = document.querySelectorAll('.image')
        
        images.forEach(image =>{
        
        image.addEventListener('click',function(e){
        const imageName = e.target.dataset.id.substr(0,6)
        const imageId = e.target.dataset.id.replace(imageName + '_','')
        const imageFile = e.target.dataset.file
        const imagePath = e.target.dataset.path
        const modal = e.target.dataset.modal
        
        document.getElementById(imageName + '_thumbnail').src = imagePath + '/'+ imageFile
        document.getElementById(imageName + '_hidden').value = imageId
        MicroModal.close(modal);
        
        })
        })
        
        </script>

</x-app-layout>



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('オーナー情報編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5  mx-auto">
                          <div class="flex flex-col text-center w-full mb-12">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">オーナー情報編集</h1>
                            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify.</p>
                          </div>
                          <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <form action="{{route('admin.owners.update',['owner' => $owner->id])}}" method="post">

                            @method('PUT')
                            @csrf

                            <div class="-m-2">
                              <div class="p-2 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="name" class="leading-7 text-sm text-gray-600">名前</label>
                                  <input type="text" id="name" name="name" value="{{$owner->name}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                              </div>
                              <div class="p-2 mb-4 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                  <input type="email" id="email" name="email" value="{{$owner->email}}"required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                              </div>
                              <div class="p-2 mb-4 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="password" class="leading-7 text-sm text-gray-600">パスワード</label>
                                  <input type="password" id="password" name="password" autocomplete="new-password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                              </div>
                              <div class="p-2 mb-4 w-1/2 mx-auto">
                                <div class="relative">
                                  <label for="password_confirmation" class="leading-7 text-sm text-gray-600">パスワード確認</label>
                                  <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                              </div>
                           
                              <div class="flex justify-around p-2 w-full">
                                <button type="button" onclick="location.href='{{route('admin.owners.index')}}'" class="text-white bg-yellow-400 border-0  py-2 px-8 focus:outline-none hover:bg-yellow-500 rounded text-lg">戻る</button>
                                <button type="submit" class="text-white bg-indigo-400 border-0  py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                              </div>
                              
                              <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                                <a class="text-indigo-500">example@email.com</a>
                                <p class="leading-normal my-5">49 Smith St.
                                  <br>Saint Cloud, MN 56301
                                </p>
                                <span class="inline-flex">
                                  <a class="text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                      <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                    </svg>
                                  </a>
                                  <a class="ml-4 text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                      <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                                    </svg>
                                  </a>
                                  <a class="ml-4 text-gray-500">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                      <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                      <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                                    </svg>
                                  </a>
                                  <a class="ml-4 text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                      <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                                    </svg>
                                  </a>
                                </span>
                              </div>
                            </div>
                          </div>
                        </form>
                        </div>
                      </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

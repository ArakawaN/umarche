<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\Http\Requests\UploadRequest;
use App\Services\ImageService;


class ShopController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function (Request $request, Closure $next) {
            // dd($request->route()->parameter('shop'));
            // dd(Auth::id());

            $id = $request->route()->parameter('shop');

            if (!is_null($id)) {
                $shopOwnerId = Shop::findOrFail($id)->owner->id;
                $shopId = (int)$shopOwnerId;
                $ownerId = auth::id();
                if ($shopId !== $ownerId) {
                    abort(404);
                }
            }

            return $next($request);
        });
    }

    public function index()
    {

        // phpinfo();
        // $ownerId = Auth::id();
        $shops = Shop::where('owner_id', auth::id())->get();

        return view('owner.shops.index', compact('shops'));
    }

    public function edit(string $id)
    {
        //

        $shop = Shop::findOrFail($id);

        return view('owner.shops.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UploadRequest $request, string $id)
    {
        //



        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'information' => ['required', 'string',  'max:255',],
            'is_selling' => ['required',],
        ]);

        $imageFile = $request->image;


        if (!is_null($imageFile) && $imageFile->isValid()) {
            // Storage::putFile('public/shops', $imageFile);リサイズ無し
            // $fileName = uniqid(rand() . '_');
            // $extention = $imageFile->extension();
            // $fileNameToStore = $fileName . '.' . $extention;
            // $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();

            // // dd($imageFile, $resizedImage);
            // Storage::put('public/shops/' . $fileNameToStore, $resizedImage);

            $fileNameToStore =  ImageService::upload($imageFile, 'shops');
        }

        $shop = Shop::findOrFail($id);

        $shop->name = $request->name;
        $shop->information = $request->information;
        $shop->is_selling = $request->is_selling;

        if (!is_null($imageFile) && $imageFile->isValid()) {

            $shop->filename = $fileNameToStore;
        }

        $shop->save();

        return redirect()->route('owner.shops.index')
            ->with([
                'message' => 'ショップ情報を更新しました.',
                'status' => 'info'
            ]);
    }
}

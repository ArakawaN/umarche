<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadRequest;
use Closure;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * 
     */

    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function (Request $request, Closure $next) {
            // dd($request->route()->parameter('shop'));
            // dd(Auth::id());

            $id = $request->route()->parameter('image');

            if (!is_null($id)) {
                $imagesOwnerId = Image::findOrFail($id)->owner->id;
                $imageId = (int)$imagesOwnerId;
                if ($imageId !== Auth::id()) {
                    abort(404);
                }
            }

            return $next($request);
        });
    }


    public function index()
    {
        //

        $images = Image::where('owner_id', Auth::id())
            ->orderBy('updated_at', 'desc')->paginate();

        return view('owner.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('owner.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UploadRequest $request)
    {
        //
        $imageFiles = $request->file('files');
        if (!is_null($imageFiles)) {
            foreach ($imageFiles as $imageFile) {
                $fileNameToStore =  ImageService::upload($imageFile, 'product');

                Image::create([
                    'owner_id' => Auth::id(),
                    'filename' =>  $fileNameToStore,
                    'title' => ''
                ]);
            }
        }
        return redirect()->route('owner.images.index')
            ->with([
                'message' => '画像を登録しました.',
                'status' => 'info'
            ]);
    }


    public function edit(string $id)
    {
        //

        $image = Image::findOrFail($id);

        return view('owner.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'title' => 'string|max:50',
        ]);

        $image = Image::findOrFail($id);
        $image->title = $request->title;

        $image->save();

        return redirect()->route('owner.images.index')
            ->with([
                'message' => '画像情報を更新しました。',
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $image = Image::findOrFail($id);

        $filePath = 'public/product/' . $image->filename;

        $imageInProducts =  Product::where('image1', $image->id)
            ->orwhere('image2', $image->id)
            ->orwhere('image3', $image->id)
            ->orwhere('image4', $image->id)
            ->get();

        if ($imageInProducts) { //コレクション型
            $imageInProducts->each(function ($product) use ($image) {
                if ($product->image1 === $image->id) {
                    $product->image1 = null;
                    $product->save();
                }
                if ($product->image2 === $image->id) {
                    $product->image2 = null;
                    $product->save();
                }
                if ($product->image3 === $image->id) {
                    $product->image3 = null;
                    $product->save();
                }
                if ($product->image4 === $image->id) {
                    $product->image4 = null;
                    $product->save();
                }
            });
        }

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }


        Image::findOrFail($id)->delete();

        return redirect()->route('owner.images.index')->with([
            'message' => '画像を消去しました.',
            'status' => 'alert'
        ]);
    }
}

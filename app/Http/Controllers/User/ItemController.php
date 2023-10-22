<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;


class ItemController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:users');

        // $this->middleware(function (Request $request, Closure $next) {
        //     // dd($request->route()->parameter('shop'));
        //     // dd(Auth::id());

        //     $id = $request->route()->parameter('item');

        //     if (!is_null($id)) {
        //         $itemId = Product::findOrFail($id)->where('products.id', $id)->where('is_selling', '=', 1)->get();
        //         // dd($itemId);
        //         if (!$itemId) {
        //             abort(404);
        //         }
        //     }
        //     return $next($request);
        // });
    }

    public function index()
    {


        // $products = Product::availableItems()->get();


        Mail::to('test@test.com')
            ->send(new TestMail());

        $products = Product::all();

        // dd($products);

        return view('user.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)->sum('quantity');


        if ($quantity > 9) {
            $quantity = 9;
        }

        return view('user.show', compact('product', 'quantity'));
    }
}

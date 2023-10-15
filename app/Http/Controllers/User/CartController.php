<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function index()
    {
        $user = User::findOrFail(Auth::id());

        $products = $user->products;

        $totalPrice = 0;

        foreach ($products as $product) {

            $totalPrice += $product->price * $product->pivot->quantity; // Cartテーブルの数量
            // Usertable-CartTable-ProductTable
        }

        // dd($products, $totalPrice);

        return view('user.cart', compact('products', 'totalPrice'));
    }

    public function add(Request $request)
    {
        $itemInCart =  Cart::where('product_id', $request->product_id)
            ->where('user_id', Auth::id())->first();

        if ($itemInCart) {

            $itemInCart->quantity += $request->quantity;

            $itemInCart->save();
        } else {
            Cart::create([
                'product_id' => $request->product_id,
                'user_id' => Auth::id(),
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('user.cart.index');
    }

    public function delete($id)
    {
        Cart::where('product_id', $id) // 商品を取ってくる
            ->where('user_id', Auth::id())
            ->delete();

        return redirect()->route('user.cart.index');
    }

    public function checkout()
    {
        $user = User::findOrFail(Auth::id());
        $products = $user->products;

        $lineItems = [];

        foreach ($products as $product) {
            $lineItem = [
                'name' => $product->name,
                'description' => $product->information,
                'amount_total' => $product->price,
                'currency' => 'jpy',
                'quantity' => $product->pivot->quantity,
            ];
            array_push($lineItems, $lineItem);
        }

        // dd($lineItems);
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $session = \Stripe\Checkout\Session::create([

            'line_items' => [$lineItems],
            'mode' => 'payment',
            'success_url' => route('user.items.index'),
            'cancel_url' => route('user.cart.index'),
        ]);

        $publicKey = env('STRIPE_PUBLIC_KEY');

        return view('user.cart.checkout', compact('session', 'publicKey'));
    }
}
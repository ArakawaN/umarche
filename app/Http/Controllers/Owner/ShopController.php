<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;


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

        // $ownerId = Auth::id();
        $shops = Shop::where('owner_id', Auth::id())->get();

        return view('owner.shops.index', compact('shops'));
    }

    public function edit(string $id)
    {
        //

        $shops = Shop::findOrFail($id);

        return view('owner.shops.edit', compact('shops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $shops = Shop::findOrFail($id);

        $shops->name = $request->name;
        $shops->email = $request->email;


        $shops->save();

        return redirect()->route('owner.shops.index')
            ->with([
                'message' => 'オーナー情報を更新しました.',
                'status' => 'info'
            ]);
    }
}

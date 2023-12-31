<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\SecondaryCategory;
use App\Models\Image;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'information',
        'price',
        'is_selling',
        'sort_order',
        'secondary_category_id',
        'image1',
        'image2',
        'image3',
        'image4',
    ];


    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function category()
    {
        return $this->belongsTo(SecondaryCategory::class, 'secondary_category_id');
        //関数名とモデル名を変えたため、第二引数をかく
    }



    public function imageFirst()
    {
        return $this->belongsTo(Image::class, 'image1', 'id');
        //（モデル名、DB名、モデルのカラム名）
    }

    public function imageSecond()
    {
        return $this->belongsTo(Image::class, 'image2', 'id');
        //（モデル名、DB名、モデルのカラム名）
    }
    public function imageThird()
    {
        return $this->belongsTo(Image::class, 'image3', 'id');
        //（モデル名、DB名、モデルのカラム名）
    }
    public function imagefourth()
    {
        return $this->belongsTo(Image::class, 'image4', 'id');
        //（モデル名、DB名、モデルのカラム名）
    }



    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'carts')
            ->withPivot(['id', 'quantity']);
    }

    public function scopeAvailableItems($query)
    {

        $stocks = DB::table('t_stocks')->select('product_id', DB::raw('sum(quantity) as quantity'))
            ->groupBy('product_id')->having('quantity', '>', 1);


        return $query
            ->joinSub($stocks, 'stock', function ($join) {
                $join->on('products.id', '=', 'stock.product_id');
            })
            ->join('shops', 'products.shop_id', '=', 'shops.id')
            ->join('secondary_categories', 'products.secondary_category_id', '=', 'secondary_categories.id')
            ->join('images as image1', 'products.image1', '=', 'image1.id')
            ->where('shops.is_selling', true)
            ->select(
                'products.id as id',
                'products.name as name',
                'products.price',
                'products.sort_order as sort_order',
                'products.information',
                'secondary_categories.name as category',
                'image1.filename as filename'
            );
    }
}

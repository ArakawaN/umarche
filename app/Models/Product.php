<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\SecondaryCategory;
use App\Models\Image;
use App\Models\Stock;

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
}
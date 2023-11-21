<?php

namespace App\Models\products;

use App\Models\orders\OrderProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function stocks(){
        return $this->hasMany(ProductStock::class,'product_id');
    }
    public function orders(){
        return $this->hasMany(OrderProduct::class,'product_id');
    }
    public function discounts(){
        return $this->hasMany(ProductOffer::class,'product_id');
    }
    public function product_offers(){
        return $this->hasOne(ProductOffer::class,'product_id')->orderBy('id','DESC')->where('status','active');
    }

    public function orders_products(){

        return $this->hasMany(OrderProduct::class);
    }
}

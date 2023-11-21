<?php

namespace App\Models\orders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class); //user::id
    }

    public function order_products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id'); //user::id
    }
}

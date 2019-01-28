<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function order_products()
    {
        return $this->hasMany('App\order_products','order_id','id');
    }
}

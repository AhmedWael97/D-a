<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    public function product_images()
    {
        return $this->hasMany('App\product_images','product_id','id');
    }

    public function category()
    {
        return $this->hasOne('App\category', 'id', 'category_id');
    }

    public function order_products()
    {
        return $this->hasMany('App\order_products','product_id','id');
    }
}

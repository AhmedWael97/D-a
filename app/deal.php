<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deal extends Model
{
	public function products()
    {
        return $this->hasOne('App\products', 'id', 'product_id');
    }    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable = [
        'user_id', 'product_id', "product_num"
    ];

    public function products()
    {
    	return $this->hasMany("App\products", "product_id");
    }
}

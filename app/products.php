<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [
        'title', 'price', 'description', "img_name", "category_id"
    ];

    public function Category()
    {
    	return $this->belongsTo("App\Category", "id", "product_id");
    }
}

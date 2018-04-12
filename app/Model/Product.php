<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'id_category', 'name', 'price', 'description', 'amount', 'picture', 'currency'
    ];

    public function image()
    {
        return $this->hasOne('App\Model\Image', 'id_product', 'id');
    }

    public function category()
    {
        return $this->hasOne('App\Model\Category', 'id', 'id_category');
    }
}

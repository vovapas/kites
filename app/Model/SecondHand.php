<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SecondHand extends Model
{
    protected $table = 'second_hand';

    protected $fillable = [
        'id', 'name', 'id_category', 'price', 'description', 'picture', 'user_name', 'user_town', 'user_phone'
    ];

    public function status()
    {
        return $this->hasOne('App\Model\SecondHandCategory', 'id', 'id_category');
    }
}

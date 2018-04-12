<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SecondHandCategory extends Model
{
    protected $table = 'second_hand_categories';

    protected $fillable = [
        'id', 'name',
    ];
}

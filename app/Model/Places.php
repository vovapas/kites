<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    protected $table = 'places';

    protected $fillable = [
        'name',
        'description',
        'wind',
        'level',
        'minuses',
        'picture1',
        'picture2',
        'picture3',
        'deleted_at'
    ];
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Image extends Model
{
    use SoftDeletes;

    protected $table = 'images';

    protected $fillable = [
        'name',
        'id_product',
        'deleted_at'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listado extends Model
{
    protected $table = 'listados';

    protected $fillable = [
        'name',
        'description',
        'image_url',
    ];
}

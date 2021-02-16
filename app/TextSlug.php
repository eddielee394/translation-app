<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TextSlug extends Model
{
    protected $table ="text_slugs";

    protected $fillable = [
        'id',
        'slug'
    ];
    
}

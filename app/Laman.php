<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laman extends Model
{
    protected $table = 'laman';

    protected $fillable = ['title', 'url', 'seo_title', 'body', 'image', 'meta_description', 'meta_keyword', 'status'];
}

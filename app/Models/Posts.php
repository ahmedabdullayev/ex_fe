<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
}
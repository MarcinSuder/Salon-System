<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    public function category()
    {
            return $this->belongsTo(Categories::class);
    }
}

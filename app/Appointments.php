<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    public function clients()
    {
        return $this->belongsTo(Clients::class);
    }
}

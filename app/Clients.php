<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    public function appointments(){

        return $this->hasMany(Appointments::class);
    }
}

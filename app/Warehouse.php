<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'warehouse';

    public function products()
    {
        return $this->belongsTo(Products::class);
    }
}



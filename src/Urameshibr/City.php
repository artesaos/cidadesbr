<?php

namespace Urameshibr;

use Illuminate\Database\Eloquent\Model;

class City extends Model{

    public $timestamps = false;
    protected $fillable = [
        'name',
        'uf'
    ];
}


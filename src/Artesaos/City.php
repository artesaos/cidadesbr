<?php

namespace Artesaos;

use Illuminate\Database\Eloquent\Model;

class City extends Model{

    public $timestamps = false;
    protected $fillable = [
        'nome',
        'uf'
    ];
}


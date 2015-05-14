<?php

namespace Artesaos;

use Illuminate\Database\Eloquent\Model;

class Artesaos extends Model{

    public $timestamps = false;

    protected $fillable = ['nome', 'uf'];
}


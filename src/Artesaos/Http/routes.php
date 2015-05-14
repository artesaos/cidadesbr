<?php

Route::get('/ufs/', function($uf = null){
    return response()->json(\Artesaos\Cidade::select('uf')->distinct('uf')->orderBy('uf')->get());
});

Route::get('/cidades/{uf}', function($uf = null){
    return response()->json(\Artesaos\Cidade::where('uf', $uf)->orderBy('nome')->get());
});
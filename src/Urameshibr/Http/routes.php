<?php

Route::get('/ufs/', function($uf = null){
    return response()->json(\Urameshibr\City::select('uf')->distinct('uf')->orderBy('uf')->get());
});

Route::get('/cidades/{uf}', function($uf = null){
    return response()->json(\Urameshibr\City::where('uf', $uf)->orderBy('name')->get());
});
# Brazil Cities

Package alternativo do repositório artesaos/cidadesbr

Tenha no banco de dados do seu projeto Laravel a tabela de cidades brasileiras

[![Latest Stable Version](http://img.shields.io/packagist/v/artesaos/cidadesbr.svg?style=flat)](https://packagist.org/packages/artesaos/cidadesbr)
[![Total Downloads](http://img.shields.io/packagist/dt/artesaos/cidadesbr.svg?style=flat)](https://packagist.org/packages/artesaos/cidadesbr)
[![Maintainer](https://img.shields.io/badge/maintainer-jansenfelipe-green.svg)](https://github.com/jansenfelipe)
[![License](http://img.shields.io/packagist/l/artesaos/cidadesbr.svg?style=flat)](https://packagist.org/packages/artesaos/cidadesbr)

### Como usar

Adicione o package

```sh
$ composer require urameshibr/brazilcities
```

Adicione o Provider no arquivo `config/app.php`

```php
// file START ommited
'providers' => [
    // other providers ommited
    'Urameshibr\Providers\CityServiceProvider',
],
// file END ommited
```

Importe migrations/seeds

```sh
$ php artisan vendor:publish --provider="Urameshibr\Providers\CityServiceProvider"
```

Execute

```sh
$ composer dump-auto
$ php artisan migrate
$ php artisan db:seed --class="CitySeeder"
```

### Model Urameshibr\City

O model `Urameshibr\City` já está disponível para uso:

```php
<?php

namespace Urameshibr;

use Illuminate\Database\Eloquent\Model;

class City extends Model{

    public $timestamps = false;

    protected $fillable = ['name', 'uf'];
}
```
     
### Rotas

As rotas abaixo já estão disponíveis para uso:

```php
Route::get('/ufs/', function($uf = null){
    return response()->json(\Urameshibr\City::select('uf')->distinct('uf')->orderBy('uf')->get());
});

Route::get('/cities/{uf}', function($uf = null){
    return response()->json(\Urameshibr\City::where('uf', $uf)->orderBy('name')->get());
});
```
     
### jQuery helper

Se desejar, um plugin está disponível para carregar seus selectBoxes via ajax.

Adicione o `scripts.js`

```html
<script src="/vendor/urameshibr/cities/js/script.js"></script>
```

HTML:

```html
<select id="uf" default="MG"></select>
<select id="city"></select>
```

JS:
```js
$('#uf').ufs({
    onChange: function(uf){
        $('#city').cities({uf: uf});
    }
});
```

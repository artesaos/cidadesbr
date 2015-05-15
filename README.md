# Cidades BR

Tenha no banco de dados do seu projeto Laravel a tabela de cidades brasileiras

[![Latest Stable Version](http://img.shields.io/packagist/v/artesaos/cidadesbr.svg?style=flat)](https://packagist.org/packages/artesaos/cidadesbr)
[![Total Downloads](http://img.shields.io/packagist/dt/artesaos/cidadesbr.svg?style=flat)](https://packagist.org/packages/artesaos/cidadesbr)
[![Maintainer](https://img.shields.io/badge/maintainer-jansenfelipe-green.svg)](https://github.com/jansenfelipe)
[![License](http://img.shields.io/packagist/l/artesaos/cidadesbr.svg?style=flat)](https://packagist.org/packages/artesaos/cidadesbr)

### Como usar

Adicione o package

```sh
$ composer require artesaos/cidadesbr
```

Adicione o Provider no arquivo `config/app.php`

```php
// file START ommited
'providers' => [
    // other providers ommited
    'Artesaos\Providers\CidadesServiceProvider',
],
// file END ommited
```

Importe migrations/seeds

```sh
$ php artisan vendor:publish --provider="Artesaos\Providers\CidadesServiceProvider"
```

Execute

```sh
$ composer dump-auto
$ php artisan migrate
$ php artisan db:seed --class="CidadesSeeder"
```

### Model Artesaos\Cidade

O model `Artesaos\Cidade` já está disponível para uso:

```php
<?php

namespace Artesaos;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model{

    public $timestamps = false;

    protected $fillable = ['nome', 'uf'];
}
```
     
### Rotas

As rotas abaixo já estão disponíveis para uso:

```php
Route::get('/ufs/', function($uf = null){
    return response()->json(\Artesaos\Cidade::select('uf')->distinct('uf')->orderBy('uf')->get());
});

Route::get('/cidades/{uf}', function($uf = null){
    return response()->json(\Artesaos\Cidade::where('uf', $uf)->orderBy('nome')->get());
});
```
     
### jQuery helper

Se desejar, um plugin está disponível para carregar seus selectBoxes via ajax.

Adicione o `scripts.js`

```html
<script src="/vendor/artesaos/cidades/js/script.js"></script>
```

HTML:

```html
<select id="uf" default="MG"></select>
<select id="cidade"></select>
```

JS:
```js
$('#uf').ufs({
    onChange: function(uf){
        $('#cidade').cidades({uf: uf});
    }
});
```

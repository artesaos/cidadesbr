<?php

namespace Artesaos\Providers;

use Illuminate\Support\ServiceProvider;

class CidadesServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        $back = DIRECTORY_SEPARATOR . '..';
        $database = __DIR__ . $back . $back . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR;

        $this->publishes([
            $database . 'migrations' => base_path('database/migrations'),
            $database . 'seeds' => base_path('database/seeds'),
            __DIR__ . '/../../../public' => base_path('public/vendor/artesaos/cidades'),
        ]);


        include __DIR__ . '/../Http/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        // Bind any implementations.
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return [];
    }

}


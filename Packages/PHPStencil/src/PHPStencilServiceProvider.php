<?php namespace EONConsulting\PHPStencil;

use Illuminate\Support\ServiceProvider;

/**
 * Class PHPStencilServiceProvider
 * @package EONConsulting\PHPStencil
 */
class PHPStencilServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bind( 'phpstencil', function () {
            return new PHPStencil();
        });
        $this->app->register(\Tsugi\TsugiServiceProvider::class);
    }

    /**
     * What to boot with the package
     */
    public function boot() {
        $this->loadRoutesFrom(__DIR__.'/Factories/WebService/Routes/routes_rest.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'phpstencil');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes([
            __DIR__ . '/database/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');
    }
}
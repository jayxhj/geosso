<?php

namespace Sso\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;


class SsoServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // add route
        $this->_setupRoutes($this->app->router);

        // add helper
        $this->_addHelper();

        // run php artisan vendor:publish to publish config
        $this->publishes([
            __DIR__.'/../config/ssoclientconfig.php' => config_path('ssoclientconfig.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // service 由各个应用在 AppServiceProvider 单独绑定对应实现
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    private function _addHelper()
    {
        require __DIR__.'/../Support/SsoHelper.php';
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     * @return void
     */
    private function _setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Sso\Http\Controllers'], function ($router) {
            require __DIR__.'/../Http/routes.php';
        });
    }


}

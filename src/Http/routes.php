<?php

Route::group(['domain' => 'ana.geotmt.com'], function () {
    Route::get('/sso', [
        'config_name' => 'ana',
        'uses'        => 'SsoController@index',
        'middleware'  => Sso\Http\Middleware\SsoMiddleware::class,
        'namespace '  => 'Sso\Http\Controllers'
    ]);
});

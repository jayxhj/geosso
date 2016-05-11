<?php

$groups = config('ssoclientconfig');

foreach ($groups as $client) {
    Route::group(['domain' => array_get($client, 'domain')], function () use ($client) {
        Route::get('/sso', [
            'config_name' => array_get($client, 'config_name'),
            'uses'        => 'SsoController@index',
            'middleware'  => Sso\Http\Middleware\SsoMiddleware::class,
            'namespace '  => 'Sso\Http\Controllers'
        ]);
    });
}

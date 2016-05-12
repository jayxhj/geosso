<?php

$groups = config('ssoclientconfig');

foreach ($groups as $configKey => $client) {
    Route::group(['domain' => array_get($client, 'domain')], function () use ($configKey) {
        Route::get('/sso', [
            'config_key' => $configKey,
            'uses'       => 'SsoController@index',
            'middleware' => Sso\Http\Middleware\SsoMiddleware::class,
            'namespace ' => 'Sso\Http\Controllers'
        ]);
    });
}

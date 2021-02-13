<?php

use Illuminate\Support\Facades\Route;
use ElasticAuth\SocialiteProvider\Http\Controllers\Auth\ElasticAuthAuthenticateSessionController;

Route::group(['prefix' => '/oauth', 'as' => 'oauth.'], function() {

    Route::group(['prefix' => '/passport', 'as' => 'passport.'], function() {

        Route::get('/redirect', ElasticAuthAuthenticateSessionController::class, 'redirectToProvider')
            ->name('redirect');

        Route::get('/callback', ElasticAuthAuthenticateSessionController::class, 'handleProviderCallback')
            ->name('callback');

    });

});
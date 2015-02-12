<?php
/*
 * API
 */
$router->group(['prefix' => 'api/v1/'], function($router)
{
    $router->get('/{slug}/shoe-requests', ['uses' => 'Members\Http\Controllers\MemberController@getMember']);
});


$router->get('/auth/sign-up', ['as' => 'sign.up', 'uses' => 'Members\Http\Controllers\Auth\AuthController@getSignUp']);
$router->get('/auth/logout', ['as' => 'logout', 'uses' => 'Members\Http\Controllers\Auth\AuthController@getLogout']);
$router->post('/auth/login', ['as' => 'login', 'uses' => 'Members\Http\Controllers\Auth\AuthController@postLogin']);
$router->post('/auth/register', ['as' => 'register', 'uses' => 'Members\Http\Controllers\Auth\AuthController@postRegister']);
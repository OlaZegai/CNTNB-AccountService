<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$router->post('/Account/Register', 'AccountsController@register');
$router->delete('/Account/Delete/{id}', 'AccountsController@delete');
$router->put('/Account/Update/{id}', 'AccountsController@update');
$router->get('/Account/GetRecord/{id}', 'AccountsController@getRecord');
$router->get('/Accounts', 'AccountsController@getAllRecord');

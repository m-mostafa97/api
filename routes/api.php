<?php

use Illuminate\Http\Request;

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
    return auth()->user();
});
Route::namespace('API')->group(function () {
    Route::post('register', 'RegisterController@register');
    Route::resource('books','BookController')->middleware('auth:api');
    // Route::post('logout', 'LoginController@logout')->middleware('jwt.auth');
});

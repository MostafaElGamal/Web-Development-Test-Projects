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
    return $request->user();
});


Route::middleware('auth:api')->post('/logout', 'AuthController@logout');

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');


Route::apiResource('/list', 'ListController');
Route::apiResource('/card', 'CardController');
Route::apiResource('/card/{card}/comment', 'CommentController');
Route::put('/card/{card}/{list}', 'CardController@dragUpdate');

Route::get('/mail', 'SentMail@home');
Route::get('/send/mail', 'SentMail@sendmail')->name('sentmail');

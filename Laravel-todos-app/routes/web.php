<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('todos', 'Todos@TodosIndex');
Route::get('todos/{id_do}', 'Todos@show');
Route::get('create/', 'Todos@create');
Route::post('store-todos', 'Todos@store');

Route::get('todos/{todo_id}/edit', 'Todos@edit');
Route::post('todos/{edit_link}/update-todos', 'Todos@update');
Route::get('todos/{todo}/delete', 'Todos@delete');

Route:: get('todos/{todo_id}/complete', 'Todos@complete');

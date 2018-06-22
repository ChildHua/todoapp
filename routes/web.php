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
    return view('passport');
});
Route::get('/ProxyHelpers.php',function (){
    return 'test';
});

Route::post('/login','Auth\LoginController@login');
Route::post('/register','Auth\RegisterController@register');
//Route::post('/login',function (){
//    return 11;
//});
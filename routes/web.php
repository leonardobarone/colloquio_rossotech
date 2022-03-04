<?php

use App\Http\Controllers\LeoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FrontController@index');

Route::get('/categories', 'FrontController@categories')->name('categories');
Route::get('/categories/{id}', 'FrontController@code')->name('code');

Route::get('/product-info/{code}', 'FrontController@show')->name('show');


// Route::get('/leo', 'LeoController@index');
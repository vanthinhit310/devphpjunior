<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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
Route::group([
    'as'=> 'app.'
],function(){
    Route::get('/', 'HomeController@getIndex')->name('home');
});

Auth::routes();


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

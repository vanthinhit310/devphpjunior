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
    Route::get('/about-page', 'PagesController@getAboutPages')->name('about');
    Route::get('/blog-post', 'PagesController@getBlogPages')->name('blog');
    Route::get('/contact-us', 'PagesController@getContactPages')->name('contacts');
    Route::get('/post/{category?}/{slug?}', 'PagesController@getPostPages')->name('post');
    Route::get('/thank-you', 'HomeController@getIndex')->name('thank-you');
});
Route::group([
    'as'=> 'practice.'
],function(){
    Route::get('/mai-thanh', 'PagesController@getMaiThanhPages')->name('maithanh');
});

Route::group([
    'as'=> 'process.'
],function(){
    Route::post('process-feedback','FeedbackController@processingFeedback')->name('sendFeedback');
    //activate user
    Route::get('activate/{token}', 'Auth\RegisterController@activate')->name('activate');
    //register
    Route::post('process-register', 'Auth\RegisterController@register')->name('register');
    //login
    Route::post('process-login', 'Auth\LoginController@login')->name('login');
});


//Telegram bot
Route::group([
    'as'=> 'telegram.'
], function (){
Route::get('/updated-activity', 'TelegramBotController@updatedActivity')->name('updatedActivity');

});


Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

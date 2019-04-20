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
    Route::get('/thank-you', 'HomeController@getIndex')->name('thank-you');
});

Route::group([
    'as'=> 'process.'
],function(){
    Route::post('process-feedback','FeedbackController@processingFeedback')->name('sendFeedback');
});
Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

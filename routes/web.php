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
    'as' => 'app.'
], function () {
    Route::get('/', 'HomeController@getIndex')->name('home');
    Route::get('/about-page', 'PagesController@getAboutPages')->name('about');
    Route::get('/blog-post', 'PagesController@getBlogPages')->name('blog');
    Route::get('/contact-us', 'PagesController@getContactPages')->name('contacts');
    Route::get('/post/{category?}/{slug?}', 'PagesController@getPostPages')->name('post');
    Route::get('/thank-you', 'HomeController@getIndex')->name('thank-you');
    Route::get('/reset-password', 'PagesController@getResetPasswordPage')->name('reset');
    Route::get('/get-new-password', 'PagesController@getChangePasswordPage')->name('change');
    Route::get('/update-new-password', 'PagesController@getUpdatePasswordPage')->name('update')->middleware('auth');
    Route::get('/store-new-log-daily', 'PagesController@getCreateLogPage')->name('log-index')->middleware('auth');
    Route::get('/search-results', 'SearchController@getSearchResultPage')->name('searchPage');
});
Route::group([
    'as' => 'practice.'
], function () {
    Route::get('/mai-thanh', 'PagesController@getMaiThanhPages')->name('maithanh');
});

Route::group([
    'as' => 'process.'
], function () {
    Route::post('process-feedback', 'FeedbackController@processingFeedback')->name('sendFeedback')->middleware('auth');
    //activate user
    Route::get('activate/{token}', 'Auth\RegisterController@activate')->name('activate');
    //register
    Route::post('process-register', 'Auth\RegisterController@register')->name('register');
    //login
    Route::post('process-login', 'Auth\LoginController@login')->name('login');
    //logout
    Route::get('process-logout', 'Auth\LoginController@logout')->name('logout');
    //Forgot passwords
    Route::post('process-reset-password', 'Auth\ForgotPasswordController@resetPassword')->name('reset');
    Route::post('password/store-new-password', 'Auth\ResetPasswordController@changPassword')->name('change-Password');
    Route::get('password-reset/{token}', 'Auth\ForgotPasswordController@setNewPassword')->name('activatePassword');
    //Update password
    Route::post('password/update-new-password',
        'Auth\ChangePasswordController@updateNewPassword')->name('update-Password');
    // Search form Post Details
    Route::get('process_search', 'SearchController@create')->name('search');
    //Create new Log
    Route::post('process_create_new_log', 'DailyLogController@create')->name('storeLog')->middleware('auth');

});




//Telegram bot
Route::group([
    'as' => 'telegram.'
], function () {
    Route::get('/telegram/updated-activity', 'TelegramBotController@updatedActivity')->name('updatedActivity');
    Route::get('/telegram/send-message', 'TelegramBotController@sendMessage')->name('sendMessage');
    Route::post('/telegram/store-message', 'TelegramBotController@storeMessage')->name('storeMessage');
    Route::get('/telegram/send-photo', 'TelegramBotController@sendPhoto')->name('sendPhoto');
    Route::post('/telegram/store-photo', 'TelegramBotController@storePhoto')->name('storePhoto');

});





// Dev Test

Route::group([
    'as' => 'test.'
], function () {
    Route::get('dev/test', 'DevTestController@DevTest')->name('');
    Route::get('search-pages', 'DevTestController@index')->name('search');
    Route::get('process-search', 'DevTestController@search')->name('search_function');

});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

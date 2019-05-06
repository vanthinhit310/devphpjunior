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
    Route::get('/profile/{id?}', 'PagesController@getProfilePages')->name('profile')->middleware('auth');
    Route::get('/post/{category?}/{slug?}', 'PagesController@getPostPages')->name('post');
    Route::get('/thank-you', 'HomeController@getIndex')->name('thank-you');
    Route::get('/reset-password', 'PagesController@getResetPasswordPage')->name('reset');
    Route::get('/get-new-password', 'PagesController@getChangePasswordPage')->name('change');
    Route::get('/update-new-password', 'PagesController@getUpdatePasswordPage')->name('update')->middleware('auth');
    Route::get('/store-new-log-daily', 'PagesController@getCreateLogPage')->name('log-index')->middleware('auth');
    Route::get('/search-results', 'SearchController@getSearchResultPage')->name('searchPage');
    Route::get('/log-daily', 'PagesController@getListLogDailyPage')->name('logDailyPage')->middleware('auth');
    Route::get('log/{id?}', 'PagesController@getLogDetailsPage')->name('logDetail')->middleware('auth');
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
    //Load data from DB with  Ajax
    Route::post('load-data-logs', 'DailyLogController@loadDataAjax')->middleware('auth');
    //Update Profile
    Route::post('update-profile', 'ProfileController@updateProfileUser')->name('updateProfile')->middleware('auth');

});

//Extension route
Route::group([
    'as' => 'extension.'
], function () {
    Route::get('download-pdf', 'PDFController@index')->name('createPDFFile');
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
    Route::get('test-pages', 'DevTestController@index')->name('test');
    Route::post('upload-image', 'DevTestController@uploadImage')->name('upload')->middleware('check_access_token');
//https://dev.phpjunior.com/imgur/callback
    Route::get('imgur/callback', 'DevTestController@getAuth')->name('auth');
    Route::post('/saveAuth', 'DevTestController@saveAuth')->name('saveAuth');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::group(['middleware' => 'admin.user'], function () {
        Route::get('exportListPosts', "Admin\\AdminController@exportListPosts")->name("exportListPosts");
        Route::get('exportListLogs', "Admin\\AdminController@exportListLogs")->name("exportListLogs");
    });
});

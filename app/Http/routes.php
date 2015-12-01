<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::pattern('slug', '[a-z0-9\-]+');
Route::get('admin', function(){
    return redirect('admin/post');
});
/*Route::get('admin', 'Admin\PostController@index');
Route::get('admin/post', 'Admin\PostController@index');
Route::get('admin/tag', 'Admin\PostController@index');
Route::get('admin/upload', 'Admin\PostController@index');*/
Route::get('blog/{slug}', 'BlogController@showPost');
Route::get('/', 'IndexController@getIndex');
Route::get('categories', ['as' => 'browse.categories', 'uses' => 'IndexController@getCategoryIndex']);
Route::get('categories/{category_slug}', 'IndexController@getCategoryIndex');
Route::get('tag/{tag_slug}', 'IndexController@getTagIndex');
Route::group([
    'namespace' => 'Admin', 
    'middleware' => 'auth',
], function () {
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/tag', 'TagController', ['except' => 'show']);
    Route::resource('admin/category', 'CategoryController');
    Route::get('admin/upload', 'UploadController@index');
    Route::post('admin/upload/file', 'UploadController@uploadFile');
    Route::delete('admin/upload/file', 'UploadController@deleteFile');
    Route::post('admin/upload/folder', 'UploadController@createFolder');
    Route::delete('admin/upload/folder', 'UploadController@deleteFolder');
    Route::post('admin/upload/img', 'UploadFileController@img');
});
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('music', 'MusicController@index');
Route::get('music/ajax', 'MusicController@achieve');
Route::get('contact', 'ContactController@showForm');
Route::post('contact', 'ContactController@sendContactInfo');




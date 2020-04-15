<?php

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

Auth::routes(['register' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


// Posts Routes /////////////////////////////////////////////////////////////////
Route::get('/post/index', 'PostController@index')->name('post.index');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
Route::get('/post/trashed', 'PostController@trashed')->name('post.trashed');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/post/delete/{id}', 'PostController@destroy')->name('post.delete');
Route::get('/post/hdelete/{id}', 'PostController@hdelete')->name('post.hdelete');
Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
//////////////////////////////////////////////////////////////////////////////////


// Categories Routes /////////////////////////////////////////////////////////////////////
Route::get('/category/index', 'CategoryController@index')->name('category.index');
Route::get('/category/create', 'CategoryController@create')->name('category.create');
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::post('/category/store', 'CategoryController@store')->name('category.store');
Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');
///////////////////////////////////////////////////////////////////////////////////////////


// Tags Routes /////////////////////////////////////////////////////////////////////
Route::get('/tag/index', 'TagController@index')->name('tag.index');
Route::get('/tag/create', 'TagController@create')->name('tag.create');
Route::get('/tag/edit/{id}', 'TagController@edit')->name('tag.edit');
Route::post('/tag/store', 'TagController@store')->name('tag.store');
Route::post('/tag/update/{id}', 'TagController@update')->name('tag.update');
Route::get('/tag/delete/{id}', 'TagController@destroy')->name('tag.delete');
///////////////////////////////////////////////////////////////////////////////////////////



// Users Routes /////////////////////////////////////////////////////////////////////
Route::get('/user/index', 'UserController@index')->name('user.index');
Route::get('/user/create', 'UserController@create')->name('user.create');
Route::post('/user/store', 'UserController@store')->name('user.store');
Route::get('/user/admin/{id}', 'UserController@admin')->name('user.admin');
Route::get('/user/notadmin/{id}', 'UserController@notadmin')->name('user.notadmin');
Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('/user/update/{id}', 'UserController@update')->name('user.update');
///////////////////////////////////////////////////////////////////////////////////////////

  //route for Settings /////////////////////////////////////////////////////////////////////
  Route::get('/settings/index', 'SettingsController@index')->name('settings');
  Route::post('/settings/update', 'SettingsController@update')->name('settings.update');
  ///////////////////////////////////////////////////////////////////////////////////////////

  // Route for the front-end UI/////////////////////////////////////////////////////////////////////
  Route::get('/', 'siteUIController@index')->name('Website');
  Route::get('/{slug}', 'siteUIController@showPost')->name('post.show');


Route::get('/test', function () {
    // return App\Tag::find(4)->posts;
    // return App\Post::find(7)->tags;
    return App\User::find(1)->profile;
});

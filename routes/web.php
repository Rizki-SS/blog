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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'postController');
    Route::get('files', 'FilesController@index')->name('Files Manager');
});

Route::group(['prefix' => 'admin/filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/', 'mainController@main')->name('welcome');
Route::get('/post', 'mainController@index')->name('allpost');
Route::get('/{y}/{m}/{title}', 'mainController@post')->name('single_post');

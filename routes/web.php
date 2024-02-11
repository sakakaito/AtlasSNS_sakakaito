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
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use APP\Http\Controllers\HomeController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
//use APP\Http\Controllers\PostsController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');//<--追加した
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index')->middleware('auth');
Route::post('/top','PostsController@index');

Route::get('/profile','UsersController@profile')->name('users.profile')->middleware('auth');
Route::post('/profile','UsersController@profileupdate')->name('users.profileupdate');

Route::get('/anotherprofile/{id}','UsersController@another')->name('users.another')->middleware('auth');
//ログアウト
Route::get('/logout','Auth\LoginController@logout');

//検索機能
Route::get('/search','UsersController@search')->name('users.search')->middleware('auth');
Route::post('/search','UsersController@search');

//フォロー機能
Route::post('/search/{user}/follow','UsersController@follow')->name('follow');
Route::post('/search/{user}/unfollow','UsersController@unfollow')->name('unfollow');

//フォロー、フォロワー数の表示
Route::get('/top/{user}','UsersController@show');

Route::get('/follow-list','FollowsController@followList')->name('follows.followList')->middleware('auth');
Route::get('/follower-list','FollowsController@followerList')->name('follows.followerList')->middleware('auth');

//投稿機能
Route::get('/post','PostsController@index')->name('posts.index')->middleware('auth');//投稿データ表示用ルート設定
Route::get('/post','PostsController@create')->name('posts.create')->middleware('auth');
Route::post('/post','PostsController@store')->name('posts.store');//投稿データ保存用ルート設定

//編集機能
Route::post('/post/update','PostsController@update')->name('posts.update');//更新用のルート設定
//削除機能
Route::post('/post/delete','PostsController@delete')->name('posts.delete');//削除用のルート設定

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

Route::get('/profile','UsersController@profile')->middleware('auth');
Route::post('/profile','UsersController@profile');

Route::get('/search','UsersController@index')->middleware('auth');
Route::post('/search','UsersController@index');



Route::get('/follow-list','PostsController@index')->middleware('auth');
Route::post('/follow-list','PostsController@index');

Route::get('/follower-list','PostsController@index')->middleware('auth');
Route::post('/follower-list','PostsController@index');

Route::get('/logout','Auth\LoginController@logout');//ログアウト


//ユーザー情報のアクセス制限（ミドルウェア）
//Route::get('/top',function (){
//   return view('login');
//})->middleware('auth');
//Route::get('/profile',function (){
//   return view('login');
//})->middleware('auth');
//Route::get('/search',function (){
//    return view('login');
//})->middleware('auth');
//Route::get('/follow-list',function (){
//    return view('login');
//})->middleware('auth');
//Route::get('/follower-list',function (){
//    return view('login');
//})->middleware('auth');





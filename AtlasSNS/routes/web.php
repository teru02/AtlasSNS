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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register_view', 'Auth\RegisterController@registerView');

Route::post('/register', 'Auth\Register\RegisterController@register');

// Route::get('/register','Auth\registerController@validator')

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::get('/logout','Auth\LoginController@logout');

//ログイン中のページ
Route::group(['middleware'=>['auth']],function(){
  // 投稿画面の表示
Route::get('/top','PostsController@index');
// 投稿処理
Route::post('posts','PostsController@store');
// 削除
Route::get('/{id}/delete','PostsController@delete');
// 編集★
Route::post('/edit','PostsController@edit');

Route::get('/profile','UsersController@profile');
// Route::get('{id}/profile','UsersController@profile');

Route::post('/profile/edit','UsersController@profileEdit');

Route::get('/search','UsersController@search');

Route::post('users/{user}/follow','UsersController@follow')->name('follow');
Route::delete('users/{user}/unfollow','UsersController@unfollow')->name('unfollow');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

Route::get('/profile/{id}','UsersController@userProfile');
});

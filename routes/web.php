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

Route::get('/', 'PagesController@home');

Route::get('/messages/{message}', 'MessagesController@show');

Auth::routes();

Route::get('/auth/facebook', 'SocialAuthController@facebook');
Route::get('/auth/facebook/callback', 'SocialAuthController@callback');

Route::get('/messages', 'MessagesController@search');

Route::get('/{username}', 'UsersController@show');

Route::get('/{username}/follows', 'UsersController@follows');
Route::get('/{username}/followers', 'UsersController@followers');




Route::group(['middleware'=>'auth'], function(){
        Route::post('/{username}/follow', 'UsersController@follow');
        Route::get('conversations/{conversation_id}', 'UsersController@showConversation');
        Route::post('/{username}/unfollow', 'UsersController@unfollow');

        Route::post('/{username}/dms', 'UsersController@sendPrivateMessage');
        Route::post('/message/create', 'MessagesController@create');
});





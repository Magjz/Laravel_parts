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

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::get('/home', function(){
    return view('home');
});

Auth::routes();

Route::group(['prefix' => 'compte'], function(){
    Route::get('/',      ['uses' => 'UserController@index',  'as' => 'compte.index']);
    Route::post('update',['uses' => 'UserController@update', 'as' => 'compte.update']);
    Route::get('delete', ['uses' => 'UserController@delete', 'as' => 'compte.delete']);
});

Route::group(['prefix' => 'match'], function(){
    Route::get('/',    ['uses' => 'MatchController@index', 'as' => 'match.index']);
    Route::get('stat', ['uses' => 'MatchController@stat', 'as' => 'match.stat']);
    Route::get('{id}', ['uses' => 'MatchController@show', 'as' => 'match.show']);
});

Route::group(['prefix' => 'team'], function(){
    Route::get('/',    ['uses' => 'TeamController@index', 'as' => 'team.index']);
    Route::get('stat', ['uses' => 'TeamController@stat', 'as' => 'team.stat']);
    Route::get('{id}', ['uses' => 'TeamController@show', 'as' => 'team.show']);
});

Route::group(['prefix' => 'players'], function(){
    Route::get('/', ['uses' => 'PlayerController@index', 'as' => 'player.index']);
});

Route::get('admin', function(){
    return redirect('admin/match');
})->middleware('admin');    

Route::group(['prefix' => 'admin'], function(){
    Route::get ('team',               ['uses' => 'AdminController@team',        'as' => 'admin.team'])   ->middleware('admin');
    Route::post('team/update/{id}',   ['uses' => 'AdminController@teamUpdate',  'as' => 'team.update'])  ->middleware('admin');
    Route::get ('team/delete/{id}',   ['uses' => 'AdminController@teamDelete',  'as' => 'team.delete'])  ->middleware('admin');
    Route::post('team/add',           ['uses' => 'AdminController@teamAdd',     'as' => 'team.add'])     ->middleware('admin');

    Route::get ('player',             ['uses' => 'AdminController@player',      'as' => 'admin.player']) ->middleware('admin');
    Route::post('player/update/{id}', ['uses' => 'AdminController@playerUpdate','as' => 'player.update'])->middleware('admin');
    Route::get ('player/delete/{id}', ['uses' => 'AdminController@playerDelete','as' => 'player.delete'])->middleware('admin');
    Route::post('player/add',         ['uses' => 'AdminController@playerAdd',   'as' => 'player.add'])   ->middleware('admin');

    Route::get ('match',              ['uses' => 'AdminController@match',       'as' => 'admin.match'])  ->middleware('admin');
    Route::post('match/update/{id}',  ['uses' => 'AdminController@matchUpdate', 'as' => 'match.update']) ->middleware('admin');
    Route::get ('match/delete/{id}',  ['uses' => 'AdminController@matchDelete', 'as' => 'match.delete']) ->middleware('admin');
    Route::post('match/add',          ['uses' => 'AdminController@matchAdd',    'as' => 'match.add'])    ->middleware('admin');
    
    Route::get ('user',               ['uses' => 'AdminController@user',        'as' => 'admin.user'])   ->middleware('admin');
    Route::post('user/update/{id}',   ['uses' => 'AdminController@userUpdate',  'as' => 'user.update'])  ->middleware('admin');
    Route::get ('user/delete/{id}',   ['uses' => 'AdminController@userDelete',  'as' => 'user.delete'])  ->middleware('admin');
    Route::post('user/add',           ['uses' => 'AdminController@userAdd',     'as' => 'user.add'])     ->middleware('admin');
    
});
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

use App\Article;

Route::get('/', function () {
    $articles = Article::latest()->get();

    return view('home', [
        'articles' => $articles
    ]);
});

Route::get('/articles', 'ArticlesController@index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');

Route::get('/articles/{article}', 'ArticlesController@show');
Route::put('/articles/{article}', 'ArticlesController@update');
Route::delete('/articles/{article}', 'ArticlesController@destroy');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');


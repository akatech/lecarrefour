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


Route::get('/', 'PagesController@getIndex');

// Carrefour des entrepreneurs
Route::get('/interview', 'PagesController@interview');
//Route::get('/articles', 'PagesController@articles');
Route::get('/agriculture', 'PagesController@agriculture');
Route::get('/elevage', 'PagesController@elevage');
Route::get('/pisciculture', 'PagesController@pisciculture');
Route::get('/innovation', 'PagesController@innovation');
Route::get('/tech', 'PagesController@tech');
Route::get('/struct', 'PagesController@struct');
Route::get('/ong', 'PagesController@ong');
Route::get('/pme', 'PagesController@pme');
Route::get('/entreprise', 'PagesController@entreprise');
Route::get('/discussion', 'PagesController@discussion');

Route::get('/servicies', 'PagesController@services');

// Making sure our search term does only contains word and digit
Route::get('search/{s?}', 'SearchesController@getIndex')->where('s', '[\w\d]+');

Route::get('article/{slug}', 'ArticlesController@getSingle')->name('single');
Route::get('articles', 'ArticlesController@getIndex');
Route::resource('pages', 'PagesController');
Route::resource('posts', 'PostsController');
Route::resource('categories', 'CategoriesController');
Route::resource('comments', 'CommentsController');
Route::post('comments/{comment}/approve', 'CommentsController@approveComment')->name('comment.approve');
Route::post('comments/{comment}/unapprove', 'CommentsController@unapproveComment')->name('comment.unapprove');

Auth::routes();
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

Route::get('/','PageController@home');
Route::get('/a-propos/{slug}','PageController@aboutUsPages');

Auth::routes();

//
Route::get('/admin/pages','HomeController@pagesIndex');
Route::get('/admin/pages/{slug}/edit','HomeController@editPage');
Route::get('/admin/produits','HomeController@produitIndex');
Route::get('/admin/produits/{reference}/edit','HomeController@editProduit');
Route::get('/admin/slideshow','HomeController@slideShowIndex');

Route::post('/admin/pages/{slug}/edit','HomeController@makeEditPage');
Route::post('/admin/pages/add','HomeController@addPages');
Route::post("/admin/produits/add",'HomeController@addProduits');
Route::post('/admin/produits/{reference}/edit','HomeController@makeEditProduit');
Route::post('/admin/slideshow/add','HomeController@addSlideshow');

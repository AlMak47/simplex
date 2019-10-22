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
// Route::get('/about-us/{item}','PageController@aboutUs');
//
//
// Route::get('/faq/{id}','PageController@faqDetails');
// Route::get('/blog/{id}','PageController@blogDetails');
// Route::get('/produits/{id}','PageController@produitDetails');
// Route::get('/contact-us','PageController@contactUs');
// Route::post('/contact-us','PageController@postContact');
// Route::get('/contact-us/success','PageController@contactSendSuccess');

Auth::routes();

//
// Route::get('/admin', 'HomeController@index')->name('home');
// Route::get('/admin/addproduit','HomeController@addproduit');
// Route::post('/admin/addproduit','HomeController@postProduit');
// Route::get('admin/listproduit','HomeController@listProduit');
// Route::delete('admin/produit/delete/{id}','HomeController@deleteProduits');
// Route::get('admin/add-question','HomeController@addQuestion');
// Route::post('admin/add-question','HomeController@postQuestion');
// Route::get('admin/list-question','HomeController@listQuestion');
// Route::get('admin/add-article','HomeController@addArticle');
// Route::post('admin/add-article','HomeController@postArticle');
// Route::get('admin/list-article','HomeController@listArticle');
// Route::get('admin/about-settings','HomeController@aboutPage');
// Route::post('about-settings/presentation','HomeController@postPresentation');
// Route::post('about-settings/historique','HomeController@postPresentation');
// Route::post('about-settings/project','HomeController@postPresentation');

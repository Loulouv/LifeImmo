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

Route::get('/', 'HomeController@index' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Profile
 */

Route::get('/profile', 'auth\UserController@profile')->name('Profile');

Route::get('/profile/edit', 'auth\UserController@edit');

Route::post('/profile/update', 'auth\UserController@update');

//Avancement des commandes pour le bailleur
Route::get('/profile/commandes', 'Lessor\AvancementController@index');



/**
 * Gestion des documents
 */
Route::get('/document/edit', 'auth\DocumentController@gestion');
Route::post('/document/edit', 'auth\DocumentController@gestion');

//Route::get('/document/update', 'auth\DocumentController@update');
Route::post('/document/update', 'auth\DocumentController@update');

Route::post('/document/delete', 'auth\DocumentController@delete');

Route::get('/document/create', 'auth\DocumentController@create');
Route::post('/document/create', 'auth\DocumentController@create');

Route::get('/document/load', 'auth\DocumentController@download');
Route::post('/document/load', 'auth\DocumentController@download');

Route::get('/document/load/all', 'auth\DocumentController@downloadAll');
Route::post('/document/load/all', 'auth\DocumentController@downloadAll');

Route::get('/document/delete/all', 'auth\DocumentController@deleteAll');
Route::post('/document/delete/all', 'auth\DocumentController@deleteAll');

/**
 * Partie bailleur
 */

// fenetre bailleur
Route::get('/bailleur/request', 'Lessor\LessorController@lessor');
Route::post('/bailleur/request', 'Lessor\LessorController@lessor');

//sauvegarder la demande dans la session
//Route::get('/bailleur/pack/save', 'Pack\RequestController@storePack');
Route::post('/bailleur/pack/save', 'Lessor\packController@storePack');

//Pour le bien
Route::get('/bailleur/bien', 'Lessor\bienController@bien');
Route::post('/bailleur/bien/save', 'Lessor\bienController@storeBien');
Route::post('/bailleur/bien/update', 'Lessor\bienController@updateBien');

// récapitulatif de la commande
Route::get('/bailleur/récapitulatif', 'Lessor\LessorController@recap');

// les informations sont misent en BDD et envoyées par mail
Route::post('/bailleur/finish', 'Lessor\LessorController@finish');

//Page de succes 
Route::get('/bailleur/success', 'Lessor\LessorController@success');

//contact
Route::get('/bailleur/contact', 'Lessor\GuestController@contactInformation');
Route::post('/bailleur/contact/save', 'Lessor\GuestController@storeContactInformation');
Route::post('/bailleur/contact/update', 'Lessor\GuestController@updateContactInformation');


/**
 * Administrateur
 */
Route::get('/conseiller/administration', 'Admin\AdminController@TableauBord')->middleware('admin');

//commandes
Route::get('/conseiller/administration/commandes', 'Admin\AdminController@commandes')->middleware('admin');
Route::get('/conseiller/administration/commandes/etat/{state}', 'Pack\OrderController@commandeState')->middleware('admin');
Route::get('/conseiller/administration/commande/{id}', 'Pack\OrderController@getCommande')->middleware('admin');
Route::post('/conseiller/administration/commande/{id}/update', 'Pack\OrderController@update')->middleware('admin');
Route::post('/conseiller/administration/commande/{id}/update/options', 'Pack\OptionController@update')->middleware('admin');
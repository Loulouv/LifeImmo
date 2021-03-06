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

//autentification
Auth::routes();

//home
Route::get('/', 'HomeController@index' );
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Profile
 */
Route::get('/profile', 'auth\UserController@profile')->name('Profile');
Route::get('/profile/edit', 'auth\UserController@edit');
Route::post('/profile/update', 'auth\UserController@update');

//Avancement des commandes pour le bailleur
Route::get('/profile/commandes', 'Lessor\AvancementController@index');

//avancement des rendez-vous
Route::get('/profile/rendez-vous', 'renter\VisitController@getUserVisits');



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
Route::get('/bailleur/contact', 'Guest\GuestController@contactInformation');
Route::post('/bailleur/contact/save', 'Guest\GuestController@storeContactInformation');
Route::post('/bailleur/contact/update', 'Guest\GuestController@updateContactInformation');


/**
 * Partie locataire
 */
Route::get('/location/biens', 'Property\PropertyController@getRenting');
Route::get('/bien/{id}', 'Property\PropertyController@get');

//commancer la demande de rendez-vous
Route::post('/locataire/index', 'Renter\VisitController@index');

//guest
Route::get('/locataire/contact', 'Guest\GuestController@contactInformation');
Route::post('/locataire/contact/save', 'Guest\GuestController@storeContactInformation');

// indication des horaires
Route::get('/locataire/rendez-vous', 'Renter\VisitController@visit');
Route::post('/locataire/rendez-vous', 'Renter\VisitController@visit');

// valider la visite
Route::post('/locataire/rendez-vous/validate', 'Renter\VisitController@validateVisit');

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

//les biens
Route::get('/conseiller/administration/bien/{id}', 'Property\PropertyController@get')->middleware('admin');
Route::post('/conseiller/administration/bien/{id}/update', 'Property\PropertyController@update')->middleware('admin');
Route::post('/conseiller/administration/bien/{id}/update/state', 'Property\PropertyController@updateState')->middleware('admin');
Route::post('/conseiller/administration/bien/{id}/update/url', 'Property\PropertyController@updateUrl')->middleware('admin');

//médias
Route::post('/conseiller/administration/bien/{id}/media/create', 'Property\MediaController@create')->middleware('admin');
Route::post('/conseiller/administration/bien/media/{id}/delete', 'Property\MediaController@delete')->middleware('admin');
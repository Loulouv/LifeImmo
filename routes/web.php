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

Route::get('/profile', 'auth\UserController@profile')->name('Profile');

Route::get('/profile/edit', 'auth\UserController@edit');

Route::post('/profile/update', 'auth\UserController@update');

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

Route::get('/bailleur/pack', 'lessor\LessorController@pack');
Route::post('/bailleur/pack/save', 'lessor\LessorController@storePack');
Route::get('/bailleur/bien', 'lessor\LessorController@bien');
Route::post('/bailleur/bien/save', 'lessor\LessorController@storeBien');
Route::get('/bailleur/récapitulatif', 'lessor\LessorController@recap');
Route::get('/bailleur/contact', 'lessor\LessorController@contactInformation');
Route::post('/bailleur/contact/save', 'lessor\LessorController@storeContactInformation');

Route::post('/bailleur/finish', 'lessor\LessorController@finish');

Route::get('/bailleur/success', 'lessor\Lessor@success');

//Route::get('/profile', ['middleware' => 'auth', 'uses' => 'auth\UserController@profile'])->name('Profile');


/*
Route::middleware('auth')->group(function () {
    Route::resource('profile', 'auth\UserController', [
        'only' => ['edit', 'update'],
        'parameters' => ['profile' => 'user']
    ]);

});*/

Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');

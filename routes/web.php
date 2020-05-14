<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!j
|
*/

Route::get('/', 'Web\AuthController@dashboard')->name('dashboard');
Route::get('/login', 'Web\AuthController@login')->name('login');
Route::post('/login', 'Web\AuthController@login');
Route::get('/logout', 'Web\AuthController@logout');

Route::get('/objects', 'Web\ObjectsController@index')->name('dash-objects.index');
Route::get('/objects/add', 'Web\ObjectsController@add');
Route::post('/objects/add', 'Web\ObjectsController@add');
Route::get('/objects/{objectId}/delete','Web\ObjectsController@destroy'); //Afficher le message de confirmation de suppression
Route::post('/objects/{objectId}/delete','Web\ObjectsController@destroy'); //Supprime un objet
Route::get('/objects/{objectId}/edit','Web\ObjectsController@edit')->name('dash-objects.edit'); //Afficher le formulaire d'édition d'objet
Route::post('/objects/{objectId}/edit','Web\ObjectsController@update'); //Update l'objet

//TRANSACTIONS
Route::get('/transactions','Web\TransactionsController@index')->name('dash-transactions.index');
Route::get('/transactions/add', 'Web\TransactionsController@add');
Route::post('/transactions/add', 'Web\TransactionsController@add')->name('dash-transactions.add');
Route::get('/transactions/{transactionId}/delete','Web\TransactionsController@destroy');
Route::delete('/transactions/{transactionId}/delete','Web\TransactionsController@destroy'); //Supprime un transaction
Route::get('/transactions/{transactionId}/edit','Web\TransactionsController@edit'); //Afficher le formulaire d'édition d'objet
Route::post('/transactions/{transactionId}/edit','Web\TransactionsController@update'); //Afficher le formulaire d'édition d'objet


// USERS
Route::get('/users', 'Web\UsersController@index')->name('dash-users.index');
Route::get('/users/add', 'Web\UsersController@add'); // Affiche le formulaire d'ajout de user
Route::post('/users/add', 'Web\UsersController@add'); // Ajoute le user
Route::get('/users/{userId}/delete','Web\UsersController@destroy'); //Afficher le message de confirmation de suppression
Route::post('/users/{objectId}/delete','Web\UsersController@destroy'); //Supprime un objet
Route::get('/users/{userId}/edit','Web\UsersController@edit')->name('dash-users.edit'); //Afficher le formulaire d'édition de user
Route::post('/users/{userId}/edit','Web\UsersController@update'); //Update le user

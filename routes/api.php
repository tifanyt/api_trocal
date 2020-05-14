<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Unprotected routes
Route::post('register', 'UsersController@register');
Route::group([
  'middleware' => 'api',
  'prefix' => 'auth'
], function ($router) {
  Route::post('login', 'AuthController@login');
  Route::post('logout', 'AuthController@logout');
  Route::post('refresh', 'AuthController@refresh'); // Refresh token
  Route::get('currentUser', 'AuthController@currentUser'); // Get currently logged user
});

// Protected routes
Route::group(['middleware' => ['jwt.verify']], function() {

  /*
  * Ressource: Objects
  */
  Route::get('objects/research','ObjectsController@research')->name('objects.research'); // Search for objects with a keyword or zone or category
  Route::resource('objects', 'ObjectsController'); // Objects routes bundle
  Route::get('/users/{userId}/objects/{objectId}','ObjectsController@show')->name('objects.show'); // Get a user's object
  Route::get('/users/{userId}/objects','ObjectsController@placard')->name('objects.placard'); // Get all user's objects

  /*
  * Ressource: Users
  */
  Route::resource('users', 'UsersController'); // Users routes bundle

  /*
  * Ressource: Transactions
  */
  Route::resource('transactions', 'TransactionsController'); // Transaction routes bundle
  Route::get('/users/{userId}/transactions', 'TransactionsController@index')->name('transactions.index'); // Get all transactions from a user and/or according to the state (pending, accpeted, completed)

  /*
  * Ressource: Evaluations
  */
  Route::resource('evaluations', 'EvaluationsController'); // Evaluation routes bundle
  Route::get('/users/{userId}/evaluations', 'EvaluationsController@index')->name('evaluations.index'); // Get all evaluations from a user

});

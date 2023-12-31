<?php

use Illuminate\Support\Facades\Route;

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

URL::forceScheme('https');

// returns the home page with all users
Route::get('/', UserController::class .'@index')->name('users.index');
// returns the form for adding a post
Route::get('/users/create', UserController::class . '@create')->name('users.create');
// adds a post to the database
Route::post('/users', UserController::class .'@store')->name('users.store');
// returns a page that shows a full post
Route::get('/users/{post}', UserController::class .'@show')->name('users.show');
// returns the form for editing a post
Route::get('/users/{post}/edit', UserController::class .'@edit')->name('users.edit');
// updates a post
Route::put('/users/{post}', UserController::class .'@update')->name('users.update');
// deletes a post
Route::delete('/users/{post}', UserController::class .'@destroy')->name('users.destroy');

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/addtask','TaskController@addtask' )->name('addtask');
// Route::get('/tasks','TaskController@tasklist' )->name('tasks');
// Route::post('/store', 'TaskController@store')->name('store');  


//////// CRUD Route list - Clients //////////

Route::get('clients', 'ClientController@index')->name('clients.index');

Route::get('clients/create', 'ClientController@create')->name('clients.create'); 

Route::get('clients/{id}/edit', 'ClientController@edit')->name('clients.edit');

// Route::get('clients/{id}', 'ClientController@show')->name('clients.show');

Route::post('clients/store', 'ClientController@store')->name('clients.store');

Route::get('clients/{id}/delete', 'ClientController@destroy')->name('clients.delete'); 


//////// CRUD Route list - Projects //////////

Route::get('projects', 'ProjectController@index')->name('projects.index');

Route::get('projects/create', 'ProjectController@create')->name('projects.create'); 

Route::get('projects/{id}/edit', 'ProjectController@edit')->name('projects.edit');

// Route::get('projects/{id}', 'ProjectController@show')->name('projects.show');

Route::post('projects/store', 'ProjectController@store')->name('projects.store');

Route::get('projects/{id}/delete', 'ProjectController@destroy')->name('projects.delete'); 


//////// CRUD Route list - Devs //////////

Route::get('devs', 'DevController@index')->name('devs.index');

Route::get('devs/create', 'DevController@create')->name('devs.create'); 

Route::get('devs/{id}/edit', 'DevController@edit')->name('devs.edit');

// Route::get('devs/{id}', 'DevController@show')->name('devs.show');

Route::post('devs/store', 'DevController@store')->name('devs.store');

Route::get('devs/{id}/delete', 'DevController@destroy')->name('devs.delete'); 


//////// CRUD Route list - Tasks //////////

Route::get('tasks', 'TaskController@index')->name('tasks.index');

Route::get('tasks/create', 'TaskController@create')->name('tasks.create'); 

Route::get('tasks/{id}/edit', 'TaskController@edit')->name('tasks.edit');

Route::post('tasks/store', 'TaskController@store')->name('tasks.store');

Route::get('tasks/{id}/delete', 'TaskController@destroy')->name('tasks.delete'); 

// demo purpose 
// Route::view('/layout', 'layout');
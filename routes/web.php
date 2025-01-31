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


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::post('/contact', 'PageController@sendContact');

Route::resource('questions', 'QuestionsController');
Route::resource('answers', 'AnswersController', ['except' => ['index', 'create', 'show']]);

Auth::routes();

Route::get('/profile/{user}', 'HomeController@profile')->name('profile');

Route::get('/github/{username}', 'ApiController@github')->name('github');

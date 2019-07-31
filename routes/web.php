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
Auth::routes(['verify' => true]);


Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/settings', 'PagesController@settings')->middleware('verified');

Route::get('/services', 'PagesController@services');

Route::get('/contact-us', 'PagesController@contact_us');
Route::post('/contact-us', ['as' => 'contactus.store', 'uses' => 'ContactUSController@store']);

Route::resource('posts', 'PostsController');

// Route::get('/', function () {
//     return view('welcome');
// });

// INSERTING VARIABLES
// Route::get('/{name}', function ($name) {
//     return 'My name is' . $name;
// });


Route::get('/dashboard', 'DashBoardController@index');

//Route name
Route::get('/email', 'MailController@greetNewUser')->name('sendEmail');

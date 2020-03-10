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

Route::get('/photo', 'PhotoController@index');

// GET/contacts, mapped to the index() method,
// GET /contacts/create, mapped to the create() method,
// POST /contacts, mapped to the store() method,
// GET /contacts/{contact}, mapped to the show() method,
// GET /contacts/{contact}/edit, mapped to the edit() method,
// PUT/PATCH /contacts/{contact}, mapped to the update() method,
// DELETE /contacts/{contact}, mapped to the destroy() method.

Route::resource('contacts', 'ContactController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'adminMW'], function(){
    
    Route::match(['get', 'post'], '/adminOnlyPage/', 'HomeController@admin');
    
});
Route::group(['middleware' => 'memberMW'], function(){
    
    Route::match(['get', 'post'], '/memberOnlyPage/', 'HomeController@member');    
    
});
Route::group(['middleware' => 'superadminMW'], function(){
    
    Route::match(['get', 'post'], '/superAdminOnlyPage/', 'HomeController@super_admin');
    
});
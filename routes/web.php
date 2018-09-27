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



/*
Route :: get('/users/{id}', function($id){ //you can parse more than one value in the url
    return 'This is user '.$id;
    //this translates into if the destination url contains /id, 'get' and return the statement with input id
});
*/

Route :: get('/', 'PagesController@index'); //routing through controller class @ the index function
Route :: get('/about', 'PagesController@about');
Route :: get('/services', 'PagesController@contact');


Route :: post ('/search', 'SearchController@index');

Route::resource('posts', 'PostsController');
Auth::routes();


//DocumentViewer Library
Route::any('ViewerJS/{all?}', function(){

    return View::make('ViewerJS.index');
});

Route::resource('dashboard', 'DashboardController');
// Route::get('/dashboard', 'DashboardController@index');
// Route::post('/dashboard', 'DashboardController@destroy');

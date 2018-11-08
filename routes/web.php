<?php

// use App\Mail\AccountCreated;


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

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@contact');

Route::post ('/search', 'SearchController@index');

Route::resource('posts', 'PostsController');

Route::resource('category', 'CategoryController');

Route::resource('/application', 'ApplicationController');


// user authentication route

Auth::routes();

//DocumentViewer Library

Route::any('ViewerJS/{all?}', function(){

    return View::make('ViewerJS.index');
});

// login redirect to custom page (admin and guest)

Route::post('/login/custom', [
    'uses' => 'Auth\LoginController@login',
    'as' => 'login.custom'
]);

// dashboard redirect to custom page (admin and guest)

Route::get('/dash/custom', [
    'uses' => 'DashController@dash',
    'as' => 'dash.custom'
]);

// auth route for admin and guest dashboards

Route::group(['middleware' => 'auth'], function(){

    Route::resource('dashboard', 'DashboardController');

    Route::resource('dashboardAdmin', 'AdminDashboardController');

});

// changing admin password

Route::post('dashboardAdmin/change', [
    'uses' => 'AdminDashboardController@changePword',
    'as' => 'change'
]);

Route::post('dashboard/change', [
    'uses' => 'DashboardController@changePword',
    'as' => 'change.guest'
]);

Route::post('application/apply', [
    'uses' => 'ApplicationController@store',
    'as' => 'apply'
]);

Route::post('/dashboardAdmin/adduser', [
    'uses' => 'UserController@store',
    'as' => 'adduser'
]);

Route::post('/dashboardAdmin/reject', [
    'uses' => 'UserController@reject',
    'as' => 'reject'
]);


// Route::get('/mail', function () {
//     // send an email to "batman@batcave.io"
//     $email = 'kessysenlong@rocketmail.com';
//     Mail::to($email)->send(new AccountCreated);

//     return redirect('application');
// });

    





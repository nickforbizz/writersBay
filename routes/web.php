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
    return view('web.root');
});

Route::group(['prefix' => 'web', 'namespace'=>'Web', 'as'=>'Web.', 'middleware'=>'theweb'], function () {

    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/klove/{toString}', "KloveController@index");

    Route::get('/register', 'auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/registerUser', 'auth\RegisterController@register')->name('registerUser');

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/loginUser', 'Auth\LoginController@login')->name('loginUser');



    Route::get('/home', 'HomeController@index')->name('home');

});

Route::group(['prefix'=>'admin','namespace'=>'Admin','as'=>"Admin.", 'middleware'=>'admins'], function () {
    // Auth::routes();

    // Route::post('/loginUser', function (){
    //     return "data logged";
    // })->name('loginUser');

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    // Route::post('/logout', function(){
    //     return "bool";
    // } )->name('logout');

    //Password reset routes
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('user_password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('user_password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('user_password/reset', 'Auth\ResetPasswordController@reset');



// other
    Route::get('/', 'HomeController@index')->name('home');
});


// Route::group(['namespace' => 'Admin'], function () {
//     // Auth::routes();

//     Route::get('Admin/', function () {
//         return view('Admin.welcome');
//     });
//     Route::post('/register', function ()
//     {
//         return "register";
//     });
//     Route::get('Admin/home', 'HomeController@index')->name('home');

// });

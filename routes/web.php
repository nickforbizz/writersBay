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
    return view('index');
})->name('root');

Route::get('/login', 'Web\Auth\LoginController@showLoginForm')->name('login');
Route::post('/loginUser', 'Web\Auth\LoginController@login')->name('loginUser');

Route::get('/register', 'Web\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Admin\adminDataController@userRegistration')->name('registerUser');



//  Guest Suggestions
Route::post('suggestions', 'suggestionsController@guestSuggestions')->name('suggestions');

Route::group(['prefix' => 'admin', 'namespace'=>'Admin', 'as'=>'Admin.'], function (){


//    Route::post('/contributionsCats', 'adminDataController@contributionsCat')->name('contributionsCategory');


    //  static Pages
    include('chama/dashboardStaticPages.php');
    // Process data
    include('chama/dashboardProcessData.php');

    // get Data
    include('chama/getDashboardData.php');
    // updates
    include ('chama/updateDashboardData.php');

    // Others
    include('chama/miscFiles.php');





});








































Route::get('/test', function () {
    return "_GET some test in admin area";
})->name('test');


Route::get('/klove/{toString}', "KloveController@index");


Route::get('/admin',  'Admin\Auth\LoginController@showLoginForm')->name('Admin');
Route::post('/loginAdmin', 'Admin\Auth\LoginController@login')->name('loginAdmin');

//Route::post('/registerUser', 'Web\Auth\RegisterController@register')->name('registerUser');




Route::group(['prefix' => 'web', 'namespace'=>'Web', 'as'=>'Web.', 'middleware'=>'auth'], function () {

    // Route::get('/', function () {            , 'middleware'=>'auth'
    //     return view('web.welcome');
    // });
    Route::get('/orderDetails/{id}', 'writersAssgController@orderDetails')->name('orderDetails/{id}');
    Route::post('/webMsg', 'chatsUserController@webMsg')->name('webMsg');


    Route::get('/klove/{toString}', "KloveController@index");

    Route::post('/anonymousMsg', 'webController@anonymousMsg')->name('anonymousMsg');

    // writer pages
    Route::get('/roleit', 'webController@webDashboard')->name('home');

    Route::get('/progressAssg', 'writersAssgController@onProgressAssg')->name('progressAssg');
    Route::get('/uploadAssg/{id}', 'writersAssgController@uploadAssg')->name('uploadAssg');
    Route::get('/reviewAssg', 'writersAssgController@reviewAssg')->name('reviewAssg');
    Route::get('/rejectedAssg', 'writersAssgController@rejectedAssg')->name('rejectedAssg');
    Route::get('/revision', 'writersAssgController@revision')->name('revision');

    Route::get('/pendingAssg', 'writersAssgController@pendingAssg')->name('pendingAssg');
    Route::get('/paidAssg', 'writersAssgController@completedAssg')->name('paidAssg');

    Route::get('/completedAssg', 'writersAssgController@completedAssg')->name('completedAssg');
    Route::get('/settings', 'writersAssgController@settings')->name('settings');
    Route::get('/orders', 'writersAssgController@viewOrders')->name('orders');

    Route::get('/takeOrder/{id}/{writer_id}', 'writersAssgController@takeOrder')->name('takeOrder');
    Route::get('/logout', 'writersAssgController@theLogout')->name('logout');

    Route::post('/submitAssg', 'writersAssgController@submitAssg')->name('submitAssg');
    // Route::get('/home', 'HomeController@index')->name('home');

});

Route::group(['prefix'=>'admiddn','namespace'=>'Admidsn','as'=>"Adsdmin.", 'middleware'=>'admsdin'], function () {
    //

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    //Password reset routes
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('user_password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('user_password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('user_password/reset', 'Auth\ResetPasswordController@reset');

    // dashboard routes for returning view pages
    Route::get('/viewassg', 'DashboardController@viewAssgn')->name('viewAssg');
    Route::get('/underReview', 'DashboardController@underReview')->name('underReview');
    Route::get('/uploadAssg', 'DashboardController@uploadAssg')->name('uploadAssg');
    Route::get('/paidAssg', 'DashboardController@paidAssg')->name('pendingPay');
    Route::get('/onProgress', 'DashboardController@onProgress')->name('onProgress');
    Route::get('/onRevision', 'DashboardController@onRevision')->name('onRevision');
    Route::post('/payOrder', 'DashboardGetDataController@payOrder')->name('payOrder');

//    users
    Route::get('/viewUsers', 'DashboardController@viewUsers')->name('viewUsers');
    Route::get('/editUsers', 'DashboardController@editUsers')->name('editUsers');
    Route::get('/addAdmins', 'DashboardController@addAdmins')->name('addAdmins');
    Route::get('/viewAdmins', 'DashboardController@viewAdmins')->name('viewAdmins');
    Route::get('/editAdmins', 'DashboardController@editAdmins')->name('editAdmins');

    Route::get('/roles', 'DashboardController@roles')->name('roles');
    Route::get('/getRole/{id}', 'DashboardGetDataController@getRole')->name('getRole');
    Route::get('/delRole/{id}', 'DashboardGetDataController@delRole')->name('delRole');
    Route::post('/editRole', 'DashboardGetDataController@editRole')->name('editRole');


    Route::get('/categories', 'DashboardController@categories')->name('categories');
    Route::get('/delCategories/{id}', 'DashboardGetDataController@delCategories')->name('delCategories');
    Route::get('/getCategories/{id}', 'DashboardGetDataController@getCategories')->name('getCategories');
    Route::post('/editCategories', 'DashboardGetDataController@editCategories')->name('editCategories');
    Route::post('/addCategories', 'DashboardGetDataController@addCategories')->name('addCategories');


    Route::get('/settings', 'DashboardController@settings')->name('settings');

    // dashboard routes for processing data
    // GET Request
    Route::get('/getUser/{id}', 'DashboardGetDataController@getUser')->name('getUser');
    Route::get('/getAdmin/{id}', 'DashboardGetDataController@getAdmin')->name('getAdmin');

    // POST Requests
    Route::post('/registerAdmin', 'DashboardGetDataController@registerAdmin')->name('registerAdmin');
    Route::post('/uploadAssg', 'DashboardGetDataController@uploadAssg')->name('uploadAssg');
    Route::post('/editUser', 'DashboardGetDataController@editUser')->name('editUser');
    Route::post('/editAdmin', 'DashboardGetDataController@editAdmin')->name('editAdmin');
    Route::post('/addRole', 'DashboardGetDataController@addRole')->name('addRole');

    // confirm or reject order
    Route::get('/confirmOrder/{id}/{writer_id}', 'confirmRejectOrderController@confirmOrder')->name('confirmOrder');
    Route::post('/rejectOrder', 'confirmRejectOrderController@rejectOrder')->name('rejectOrder');

    // download files
    Route::get('/download/{file}', 'DownloadsController@download')->name('download');
    Route::get('/downloadable/{file}', 'DownloadsController@downloadable')->name('downloadable');
    Route::get('/previewdoc/{file}', 'DownloadsController@previewDoc')->name('preview');


    Route::get('/webMsg/{id}', 'chatsController@adminMsg')->name('webMsg');
    Route::get('/AdminMsg', 'chatsController@adminChart')->name('AdminMsg');



    // other
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/test', function () {
        return "_GET some test in admin area";
    })->name('test');
    Route::post('/test', function () {
        return "_POST some test";
    })->name('testp');
    // Auth::routes();

    // Route::post('/loginUser', function (){
    //     return "data logged";
    // })->name('loginUser');

    // Route::post('/logout', function(){
    //     return "bool";
    // } )->name('logout');
});











//this website was made by Wainaina Nicholas Waruingi of Mombex Ent contact him through +254707722247 or email nickforbiz@gmail.com <a href="mombexent.com">Mombexent.com </a>
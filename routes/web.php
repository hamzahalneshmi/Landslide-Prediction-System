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

Route::get('/', 'HomepageController@index');
Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as' => 'blog.show'
]);
Route::get('/category/{category}', [
    'uses' => 'CategoryController@show',
    'as' => 'category.show'
]);
Auth::routes();

Auth::routes(['verify' => true]);

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');


Auth::routes();
Route::get('/home', 'HomeController@index_reg')->name('home');
Route::get('/admin/home', 'HomeController@index')->middleware(['auth'])->name('home');
Route::get('/admin', function(){
    return 'you are admin';
})->middleware(['auth']);



Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::resource('post', 'BlogController');
Route::resource('newsletter', 'NewsletterController');

// this is the new routes after the permissions and roles 
Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'verified'])->name('admin.')->group(function () {
        Route::resource('MonitoredLocations', 'MonitoredLocationController');
        Route::resource('sensors', 'SensorsController');
        Route::resource('senseditem', 'SensedItemController');
        Route::resource('data', 'NewSensorDataController');
        Route::resource('category', 'CategoryController');
        Route::resource('adminpost', 'PostController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('roles', 'RoleController');
        Route::namespace('Admin')->group(function () {
            Route::resource('/users','UserController');
        });
        Route::resource('comments', 'CommentController');
        Route::resource('newsletter', 'NewsletterController');
        Route::get('backup','NewSensorDataController@backup');
        Route::resource('prediction', 'PredictionController');
        Route::post('prediction/temp', 'PredictionController@store');
        Route::post('prediction/pressure', 'PredictionController@pressure');
        Route::post('prediction/humidity', 'PredictionController@humidity');
        Route::post('prediction/rainfull', 'PredictionController@rainfull');
        Route::post('prediction/displacement', 'PredictionController@horizontal');
        Route::resource('displacementMonitoring', 'DisplacementController');
        Route::resource('initialization', 'InitializationController');
    });
});
// researcher

Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'verified'])->name('admin.')->group(function () {
        Route::resource('adminpost', 'PostController');
    });
});

//user
Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'verified'])->name('admin.')->group(function () {
    });
});
Route::get('/about-us', 'AboutController@index');
Route::get('/contact-us', 'ContactController@index');

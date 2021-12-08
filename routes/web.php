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

Route::get('/','FrontController@index')->name('welcome');
Route::get('about','FrontController@about')->name('about');
Route::get('causes','FrontController@causes')->name('causes');
Route::get('blogs','FrontController@blogs')->name('blogs');
Route::get('faqs','FrontController@faqs')->name('faqs');
Route::get('sponsers','FrontController@sponsers')->name('sponsers');
Route::get('contact','FrontController@contact')->name('contact');



Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['verified']], function() {

        /**************************** Route Donate ****************************/
        Route::get('donate','FrontController@donate')->name('donate');
        /**************************** Route Donate ****************************/

        Route::group(['middleware' => ['role:User']], function() {
            
            /**************************** Route Student ****************************/
            Route::get('/home', 'HomeController@index')->name('home');
            /**************************** Route Student ****************************/
        });

        Route::group(['middleware' => ['role:Manager']], function() {
            /**************************** Route Manager ****************************/
            Route::get('manager',       'Dashboard\ManagerDashboardController@index')->name('manager');
            /**************************** Route Manager ****************************/
        });

        Route::group(['middleware' => ['role:Admin']], function() {
            /**************************** Route Admin ****************************/
            Route::get('dashboard',    'Dashboard\AdminDashboardController@index')->name('dashboard');
            /**************************** Route Admin ****************************/
            /**************************** Route Users ****************************/
            Route::resource('users','User\UserController');
            Route::get('/users_upload_page','User\UserController@upload_page')->name('users.upload_page');
            Route::post('/users_csv_upload','User\UserController@upload_process')->name('users.upload_process');
            Route::get('/users_deleted_show','User\UserController@show_deleted')->name('users.show_deleted');
            Route::get('/users_restore/{id}','User\UserController@restore_single')->name('users.restore_single');
            Route::get('/users_bulk_restore','User\UserController@restore_bulk')->name('users.restore_bulk');
            Route::post('/users_bulk_delete','User\UserController@bulk_delet')->name('users.bulk_delet');
            Route::post('/users_permDelete/{id}','User\UserController@perm_Delete');
            Route::post('/users_check','User\UserController@check_users')->name('check.users');
            /**************************** Route Users ****************************/
            /**************************** Route Roles ****************************/
            Route::resource('roles','Role\RoleController');
            Route::get('/roles_deleted_show','Role\RoleController@show_deleted')->name('roles.show_deleted');
            Route::post('/roles_bulk_delete','Role\RoleController@bulk_delet')->name('roles.bulk_delet');
            Route::post('/roles_get','CommonFunctionController@get_Roles')->name('get.roles');
            /**************************** Route Roles ****************************/
            /**************************** Route Users ****************************/
            Route::resource('activities','Activity\ActivityController');
            Route::post('/activities_permDelete/{id}','Activity\ActivityController@perm_Delete');
            Route::get('/activities_clearlog','Activity\ActivityController@clearlog')->name('activities.clearlog');
            /**************************** Route Users ****************************/
            /**************************** Route Category ****************************/
            Route::resource('/categories','Category\CategoryController');
            Route::get('/categories_upload_page','Category\CategoryController@upload_page')->name('categories.upload_page');
            Route::post('/categories_csv_upload','Category\CategoryController@upload_process')->name('categories.upload_process');
            Route::get('/categories_download_csv','Category\CategoryController@download_sample_csv')->name('categories.download_csv');
            Route::get('/categories_export_csv','Category\CategoryController@export_categories')->name('categories.export_csv');
            Route::post('/categories_bulk_delete','Category\CategoryController@bulk_delet')->name('categories.bulk_delet');
            Route::get('/categories_restore/{id}','Category\CategoryController@restore_single')->name('categories.restore_single');
            Route::get('/categories_bulk_restore','Category\CategoryController@restore_bulk')->name('categories.restore_bulk');
            Route::get('/categories_deleted_show','Category\CategoryController@show_deleted')->name('categories.show_deleted');
            Route::post('/categories_permDelete/{id}','Category\CategoryController@perm_Delete');
            Route::post('/categories_bulk_permDelete','Category\CategoryController@perm_bulk_delet');
            Route::post('/categories_check','Category\CategoryController@check_categories')->name('check.categories');
            Route::post('/categories_get','Category\CategoryController@get_categories')->name('get.categories');
            /**************************** Route Category ****************************/
            /**************************** Route Tag ****************************/
            Route::resource('/tags','Tag\TagController');
            Route::get('/tags_upload_page','Tag\TagController@upload_page')->name('tags.upload_page');
            Route::post('/tags_csv_upload','Tag\TagController@upload_process')->name('tags.upload_process');
            Route::get('/tags_download_csv','Tag\TagController@download_sample_csv')->name('tags.download_csv');
            Route::get('/tags_export_csv','Tag\TagController@export_tags')->name('tags.export_csv');
            Route::post('/tags_bulk_delete','Tag\TagController@bulk_delet')->name('tags.bulk_delet');
            Route::get('/tags_restore/{id}','Tag\TagController@restore_single')->name('tags.restore_single');
            Route::get('/tags_bulk_restore','Tag\TagController@restore_bulk')->name('tags.restore_bulk');
            Route::get('/tags_deleted_show','Tag\TagController@show_deleted')->name('tags.show_deleted');
            Route::post('/tags_permDelete/{id}','Tag\TagController@perm_Delete');
            Route::post('/tags_bulk_permDelete','Tag\TagController@perm_bulk_delet');
            Route::post('/tags_check','Tag\TagController@check_tags')->name('check.tags');
            Route::post('/tags_get','Tag\TagController@get_tags')->name('get.tags');
            /**************************** Route Tag ****************************/
            /**************************** Route Currency ****************************/
            Route::resource('/currencies','Currency\CurrencyController');
            Route::get('/currencies_upload_page','Currency\CurrencyController@upload_page')->name('currencies.upload_page');
            Route::post('/currencies_csv_upload','Currency\CurrencyController@upload_process')->name('currencies.upload_process');
            Route::get('/currencies_download_csv','Currency\CurrencyController@download_sample_csv')->name('currencies.download_csv');
            Route::get('/currencies_export_csv','Currency\CurrencyController@export_currencies')->name('currencies.export_csv');
            Route::post('/currencies_bulk_delete','Currency\CurrencyController@bulk_delet')->name('currencies.bulk_delet');
            Route::get('/currencies_restore/{id}','Currency\CurrencyController@restore_single')->name('currencies.restore_single');
            Route::get('/currencies_bulk_restore','Currency\CurrencyController@restore_bulk')->name('currencies.restore_bulk');
            Route::get('/currencies_deleted_show','Currency\CurrencyController@show_deleted')->name('currencies.show_deleted');
            Route::post('/currencies_permDelete/{id}','Currency\CurrencyController@perm_Delete');
            Route::post('/currencies_bulk_permDelete','Currency\CurrencyController@perm_bulk_delet');
            Route::post('/currencies_check','Currency\CurrencyController@check_currencies')->name('check.currencies');
            Route::post('/currencies_get','Currency\CurrencyController@get_currencies')->name('get.currencies');
            /**************************** Route Currency ****************************/

        });

    });
});
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function () {
    Route::get('casino', 'CasinoController@index');
    Route::get('casino/{id}', 'CasinoController@show');

    Route::get('pages', 'PageController@index');
    Route::get('pages/{id}', 'PageController@show');

    Route::post('login', 'LoginController@index');
    Route::post('logout', 'LoginController@logout');

    Route::post('admin/casino', 'AdminCasinoController@index')->middleware('api_auth');
    Route::post('admin/casino/update', 'AdminCasinoController@update')->middleware('api_auth');
    Route::post('admin/casino/delete', 'AdminCasinoController@delete')->middleware('api_auth');
    Route::post('admin/casino/store', 'AdminCasinoController@store')->middleware('api_auth');
    Route::post('admin/casino/{id}', 'AdminCasinoController@show')->middleware('api_auth');

    Route::post('admin/bonuses', 'AdminBonusesController@index')->middleware('api_auth');
    Route::post('admin/bonuses/update', 'AdminBonusesController@update')->middleware('api_auth');
    Route::post('admin/bonuses/delete', 'AdminBonusesController@delete')->middleware('api_auth');
    Route::post('admin/bonuses/store', 'AdminBonusesController@store')->middleware('api_auth');
    Route::post('admin/bonuses/{id}', 'AdminBonusesController@show')->middleware('api_auth');

    Route::post('admin/slots', 'AdminSlotsController@index')->middleware('api_auth');
    Route::post('admin/slots/update', 'AdminSlotsController@update')->middleware('api_auth');
    Route::post('admin/slots/delete', 'AdminSlotsController@delete')->middleware('api_auth');
    Route::post('admin/slots/store', 'AdminSlotsController@store')->middleware('api_auth');
    Route::post('admin/slots/{id}', 'AdminSlotsController@show')->middleware('api_auth');

    Route::post('admin/payments', 'AdminPaymentsController@index')->middleware('api_auth');
    Route::post('admin/payments/update', 'AdminPaymentsController@update')->middleware('api_auth');
    Route::post('admin/payments/delete', 'AdminPaymentsController@delete')->middleware('api_auth');
    Route::post('admin/payments/store', 'AdminPaymentsController@store')->middleware('api_auth');
    Route::post('admin/payments/{id}', 'AdminPaymentsController@show')->middleware('api_auth');

    Route::post('admin/vendors', 'AdminVendorsController@index')->middleware('api_auth');
    Route::post('admin/vendors/update', 'AdminVendorsController@update')->middleware('api_auth');
    Route::post('admin/vendors/delete', 'AdminVendorsController@delete')->middleware('api_auth');
    Route::post('admin/vendors/store', 'AdminVendorsController@store')->middleware('api_auth');
    Route::post('admin/vendors/{id}', 'AdminVendorsController@show')->middleware('api_auth');

    Route::post('admin/blog', 'AdminBlogController@index')->middleware('api_auth');
    Route::post('admin/blog/update', 'AdminBlogController@update')->middleware('api_auth');
    Route::post('admin/blog/delete', 'AdminBlogController@delete')->middleware('api_auth');
    Route::post('admin/blog/store', 'AdminBlogController@store')->middleware('api_auth');
    Route::post('admin/blog/{id}', 'AdminBlogController@show')->middleware('api_auth');

    Route::post('admin/pages', 'AdminPageController@index')->middleware('api_auth');
    Route::post('admin/pages/update', 'AdminPageController@update')->middleware('api_auth');
    Route::post('admin/pages/{id}', 'AdminPageController@show')->middleware('api_auth');

    Route::post('admin/category', 'AdminCategoryController@index')->middleware('api_auth');
    Route::post('admin/category/update', 'AdminCategoryController@update')->middleware('api_auth');
    Route::post('admin/category/{id}', 'AdminCategoryController@show')->middleware('api_auth');

    Route::post('admin/options', 'AdminOptionsController@index')->middleware('api_auth');
    Route::post('admin/options/update', 'AdminOptionsController@update')->middleware('api_auth');
    Route::post('admin/options/{id}', 'AdminOptionsController@show')->middleware('api_auth');

    Route::post('admin/settings', 'AdminSettingsController@index')->middleware('api_auth');
    Route::post('admin/settings/update', 'AdminSettingsController@update')->middleware('api_auth');
    Route::post('admin/settings/{id}', 'AdminSettingsController@show')->middleware('api_auth');

    Route::post('admin/uploads', 'AdminUploadsController@index')->middleware('api_auth');

});


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

    Route::post('login', 'LoginController@index');
    Route::post('logout', 'LoginController@logout');
    Route::post('check-user', 'LoginController@checkUser');
    Route::post('forum-user/add-candidate', 'ForumUserController@addCandidate');

    Route::post('admin/casino', 'AdminCasinoController@index')->middleware('api_auth');
    Route::post('admin/casino/update', 'AdminCasinoController@update')->middleware('api_auth');
    Route::post('admin/casino/delete', 'AdminCasinoController@delete')->middleware('api_auth');
    Route::post('admin/casino/store', 'AdminCasinoController@store')->middleware('api_auth');
    Route::post('admin/casino/{id}', 'AdminCasinoController@show')->middleware('api_auth');

    Route::post('admin/news', 'AdminNewsController@index')->middleware('api_auth');
    Route::post('admin/news/update', 'AdminNewsController@update')->middleware('api_auth');
    Route::post('admin/news/delete', 'AdminNewsController@delete')->middleware('api_auth');
    Route::post('admin/news/store', 'AdminNewsController@store')->middleware('api_auth');
    Route::post('admin/news/{id}', 'AdminNewsController@show')->middleware('api_auth');

    Route::post('admin/interview', 'AdminInterviewController@index')->middleware('api_auth');
    Route::post('admin/interview/update', 'AdminInterviewController@update')->middleware('api_auth');
    Route::post('admin/interview/delete', 'AdminInterviewController@delete')->middleware('api_auth');
    Route::post('admin/interview/store', 'AdminInterviewController@store')->middleware('api_auth');
    Route::post('admin/interview/{id}', 'AdminInterviewController@show')->middleware('api_auth');

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
    Route::post('admin/color-scheme', 'AdminOptionsController@colorScheme')->middleware('api_auth');

    Route::post('admin/seo/post-types', 'AdminSeoController@postTypes')->middleware('api_auth');
    Route::post('admin/seo', 'AdminSeoController@index')->middleware('api_auth');
    Route::post('admin/seo/update', 'AdminSeoController@update')->middleware('api_auth');
    Route::post('admin/seo/filters', 'AdminSeoController@filters')->middleware('api_auth');

    Route::post('admin/settings', 'AdminSettingsController@index')->middleware('api_auth');
    Route::post('admin/settings/update', 'AdminSettingsController@update')->middleware('api_auth');
    Route::post('admin/settings/{id}', 'AdminSettingsController@show')->middleware('api_auth');

    Route::post('admin/search', 'AdminSearchController@index')->middleware('api_auth');

    Route::post('admin/uploads', 'AdminUploadsController@index')->middleware('api_auth');
    Route::post('admin/media', 'AdminUploadsController@media')->middleware('api_auth');
    Route::post('admin/delete-media', 'AdminUploadsController@delete')->middleware('api_auth');

    //----- Front controllers ----//
    Route::get('pages/'.config('constants.PAGES.MAIN'), 'PageController@main')->middleware('cash');
    Route::get('pages/'.config('constants.PAGES.REVIEWS'), 'PageController@reviews')->middleware('cash');
    Route::get('pages/'.config('constants.PAGES.BONUSES'), 'PageController@bonuses')->middleware('cash');
    Route::get('pages/'.config('constants.PAGES.BLOG'), 'PageController@blog')->middleware('cash');
    Route::get('pages/'.config('constants.PAGES.NEWS'), 'PageController@news')->middleware('cash');
    Route::get('pages/'.config('constants.PAGES.INTERVIEW'), 'PageController@interview')->middleware('cash');
    Route::get('pages/'.config('constants.PAGES.USEFUL'), 'PageController@useful')->middleware('cash');
    Route::get('pages/'.config('constants.PAGES.SITE_MAP'), 'PageController@sitemap');
    Route::get('pages/'.config('constants.PAGES.AUTHOR'), 'PageController@author');
    Route::get(config('constants.PAGES.SEARCH'), 'PageController@search');

    Route::get('category/'.config('constants.CATEGORY.CASINO'), 'CategoryController@casino')->middleware('cash');
    Route::get('category/'.config('constants.CATEGORY.SLOTS'), 'CategoryController@slots')->middleware('cash');
    Route::get('category/'.config('constants.CATEGORY.POPULAR_CASINO'), 'CategoryController@popularCasino')->middleware('cash');
    Route::get('category/'.config('constants.CATEGORY.LICENSED_CASINO'), 'CategoryController@licensedCasino')->middleware('cash');
    Route::get('category/'.config('constants.CATEGORY.MIN_DEPOSIT_CASINO'), 'CategoryController@minDepositCasino')->middleware('cash');
    Route::get('category/'.config('constants.CATEGORY.MAX_PAY_OUT_CASINO'), 'CategoryController@maxPayoutCasino')->middleware('cash');
    Route::get('category/'.config('constants.CATEGORY.FREE_BONUS_CASINO'), 'CategoryController@freeBonusCasino')->middleware('cash');
    Route::get('category/'.config('constants.CATEGORY.ROULETTE'), 'CategoryController@roulette');
    Route::get('category/'.config('constants.CATEGORY.GAMES'), 'CategoryController@games');
    Route::get('category/'.config('constants.CATEGORY.BLACKJACK'), 'CategoryController@blackjack');
    Route::get('category/'.config('constants.CATEGORY.BACCARAT'), 'CategoryController@baccarat');
    Route::get('category/'.config('constants.CATEGORY.NEW_SLOTS'), 'CategoryController@newSlots')->middleware('cash');
    Route::get('category/'.config('constants.CATEGORY.BEST_FOR_PAYOUT'), 'CategoryController@bestForPayout')->middleware('cash');
    Route::get('category/'.config('constants.CATEGORY.BONUS_PAY'), 'CategoryController@bonusPay')->middleware('cash');
    Route::get('category/'.config('constants.CATEGORY.PROGRESSIVE'), 'CategoryController@progressive')->middleware('cash');
    Route::get('category/'.config('constants.CATEGORY.MEGAWAYS'), 'CategoryController@megaways')->middleware('cash');

    Route::get('casino', 'CasinoController@index');
    Route::get('casino/{id}', 'CasinoController@show')->middleware('cash');
    Route::get('payments', 'PaymentController@index');
    Route::get('payments/{id}', 'PaymentController@show')->middleware('cash');
    Route::get('slots', 'SlotController@index');
    Route::get('slots/{id}', 'SlotController@show')->middleware('cash');
    Route::get('vendors', 'VendorController@index');
    Route::get('vendors/{id}', 'VendorController@show')->middleware('cash');
    Route::get('bonuses', 'BonusController@index');
    Route::get('bonuses/{id}', 'BonusController@show')->middleware('cash');
    Route::get('interview', 'InterviewController@index');
    Route::get('interview/{id}', 'InterviewController@show')->middleware('cash');
    Route::get('blog', 'BlogController@index');
    Route::get('blog/{id}', 'BlogController@show')->middleware('cash');
    Route::get('news', 'NewsController@index');
    Route::get('news/{id}', 'NewsController@show')->middleware('cash');
    Route::get('candidate/{id}', 'CandidateController@show');
    Route::post('forum-user/login', 'ForumUserController@login');
    Route::post('forum-user/logout', 'ForumUserController@logout')->middleware('forum_auth');
    Route::post('forum-user/change-password', 'ForumUserController@changePassword')->middleware('forum_auth');
    Route::post('forum-user/delete-account', 'ForumUserController@deleteAccount')->middleware('forum_auth');
    Route::post('forum-user/check-user', 'ForumUserController@checkUser');
    Route::post('tickets/store', 'TicketsController@store')->middleware('forum_auth');
    Route::post('tickets/listCasino', 'TicketsController@listCasino')->middleware('forum_auth');
    Route::post('tickets/user-tickets', 'TicketsController@userTickets')->middleware('forum_auth');


    Route::get('settings', 'SettingsController@index');
    Route::get('options', 'OptionsController@index');

});


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

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

//Clear route cache:
 Route::get('/route-cache', function() {
     $exitCode = Artisan::call('route:cache');
     return 'Routes cache cleared';
 });

 //Clear config cache:
 Route::get('/config-cache', function() {
     $exitCode = Artisan::call('config:cache');
     return 'Config cache cleared';
 }); 

// Clear application cache:
 Route::get('/clear-cache', function() {
     $exitCode = Artisan::call('cache:clear');
     return 'Application cache cleared';
 });

 // Clear view cache:
 Route::get('/view-clear', function() {
     $exitCode = Artisan::call('view:clear');
     return 'View cache cleared';
 });


// Route::get('/', 'HomeController@getResponse');

// HomeController
Route::get('/', 'HomeController@getLogin');
Route::get('/clear-cache', function() {$exitCode = Artisan::call('cache:clear');});
Route::get('/oauth/authorize', 'HomeController@getResponse');
Route::post('/shopify', 'HomeController@getPermission');
Route::get('/shopify', 'HomeController@getPermission');
Route::get('/delete', 'HomeController@Delete');

Route::any('/api/v1/create-event', 'EventController@createEvent');
Route::get('/api/v1/get-events', 'EventController@getShopifyUserEvents');
Route::any('/api/v1/create-event', 'EventController@createEvent');
Route::get('/api/v1/before-oneday-email-send', 'EventController@beforeOneDayEmailFire');
Route::get('/api/v1/sameday-email-send', 'EventController@sameDayEmailFire');
Route::any('/api/v1/update-event', 'EventController@updatesEvent');
Route::get('/api/v1/single-event', 'EventController@singhEvent');
Route::any('/api/v1/delete-event', 'EventController@deleteEvent');
Route::any('/api/v1/create-customer-event', 'EventController@createCustomerAndEvent');
Route::any('/api/v1/check-if-event-exit', 'EventController@checkEventIfExits');

Route::any('/api/v1/test', 'EventController@testFun');

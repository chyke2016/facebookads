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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Ads controllers

Route::get('/ads/publish', ['as' => 'publishedad','uses' => 'AdvertController@publishedads']);
Route::post('/ads/publish/', ['as' => 'publishad','uses' => 'AdvertController@publishad']);
Route::post('/ads/unpublish/', ['as' => 'unpublishad','uses' => 'AdvertController@unpublishad']);
Route::post('/ads/delete/', ['as' => 'deletead','uses' => 'AdvertController@deleteads']);
Route::get('/ads/add', ['as' => 'ads','uses' => 'AdvertController@addads']);
Route::post('/ads/add', ['as' => 'addads','uses' => 'AdvertController@addads2']);

//Confirmation Controllers for admin

Route::get('/confirmads/', ['as' => 'confirmads','uses' => 'AdPubController@confirmads']);
Route::get('/confirmads/{ad_id}', ['as' => 'confirmad_user','uses' => 'AdPubController@confirmad_user']);
Route::post('/confirmads/{ad_id}', ['as' => 'confirmad_user2','uses' => 'AdPubController@confirmad_user2']);
Route::post('/credit/', ['as' => 'credit_user','uses' => 'AdPubController@credit_user']);

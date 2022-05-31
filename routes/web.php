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

Route::prefix('admin')
    ->namespace('Admin')
    ->group(function () {


// Routes Profiles
Route::any('profiles/search', 'ProfileController@search')->name('profiles.search');
Route::resource('profiles', ProfileController::class);


// Routes Details Plans
Route::delete('plans/{url}/details/{idDetail}', 'PlanDetailController@destroy')->name('plan.details.destroy');
Route::get('plans/{url}/details/show/{idDetail}', 'PlanDetailController@show')->name('plan.details.show');
Route::put('plans/{url}/details/{idDetail}', 'PlanDetailController@update')->name('plan.details.update');
Route::get('plans/{url}/details/{idDetail}/edit', 'PlanDetailController@edit')->name('plan.details.edit');
Route::post('plans/{url}/details', 'PlanDetailController@store')->name('plan.details.store');
Route::get('plans/{url}/details/create', 'PlanDetailController@create')->name('plan.details.create');
Route::get('plans/{url}/details', 'PlanDetailController@index')->name('plan.details.index');


// Routes Plans

Route::get('plans/create', 'PlanController@create')->name('plans.create');
Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
Route::put('plans/{url}/update', 'PlanController@update')->name('plans.update');
Route::any('plans/plans', 'PlanController@search')->name('plans.search');
Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
Route::post('plans', 'PlanController@store')->name('plans.store');
Route::get('plans', 'PlanController@index')->name('plans.index');
Route::get('/', 'PlanController@index')->name('admin.index');




});

Route::get('/', function () {
    return view('welcome');
});

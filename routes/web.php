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

/*
********************* only reader space  no auth********************
*/

/*
Main route
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
list of cds route
*/
Route::get('/cds', [
     'uses'=>'App\Http\Controllers\CdsController@getIndex',
    'as'=> 'cds.cds']);
//Route::get('/cds', 'CdsController@getIndex' )->name('cds.cds');

/*
cd in blog with specific id route
*/
Route::get('/cd/{id}', function () {
    return view('cds.cddetails');
})->name('cds.cddetails');

/*
about page
*/
Route::get('/cdsabout', function () {
    return view('cds.cdsabout');
})->name('cds.about');


/*
*********************admin space auth********************
*/

Route::group(['prefix' => 'admin'], function () {

    /*
    Admin auth
    */
    Route::get('', [
        'uses'=>'App\Http\Controllers\AdminController@authentication',
        'as'=> 'admin.auth']
    );

    /*
    Admin main
    */
    Route::get('main',[ 
        'uses'=> 'App\Http\Controllers\AdminController@main',
        'as'=> 'admin.main']);

    /*
    Admin updateordelete
    */
    Route::get('updateordelete', [
        'uses'=> "App\Http\Controllers\AdminController@updateOrDelete",
        'as'=>'admin.updateordelete']);

    /*
    Admin update
    */
    Route::get('update/{id}', [
        'uses'=> "App\Http\Controllers\AdminController@update",
        'as'=>'admin.update'
        ]);

    /*
    Admin delete
    */
    Route::get('delete/{id}', [
        'uses'=> "App\Http\Controllers\AdminController@delete",
        'as'=>'admin.delete'
        ]);

    /*
    Test de route avec un post
    */
    Route::post('create', [
        'uses'=> "App\Http\Controllers\AdminController@add",
        'as'=>'admin.create'
        ]);
});



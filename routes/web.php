<?php

use Illuminate\Support\Facades\Route;

/*
********************* only reader space  no auth********************
*/

/*
list of cds route
*/
Route::get('/', [
    'uses' => 'App\Http\Controllers\CdsController@getIndex',
    'as' => 'cds.cds']);

/*
cd in blog with specific id route
*/
Route::get('/cd/{id}', [
    'uses' => 'App\Http\Controllers\CdsController@getDetails',
    'as' => 'cds.cddetails']);

/*
about page
*/
Route::get('/cdsabout', function () {
    return view('cds.cdsabout');
})->name('cds.about');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
********************* test ac les services ********************
*/

Route::get('/essai', function(App\CacheInterface $cache){
    dd($cache);
} );


require __DIR__.'/auth.php';

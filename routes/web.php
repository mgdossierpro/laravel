<?php

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
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
Route::get('/cds', 'CdsController@getIndex' )->name('cds.cds');

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

    Route::get('', function () {
        return view('admin.auth');
    })->name('admin.auth');

    /*
    admin main
    */
    Route::get('main', function () {
        return view('admin.main');
    })->name('admin.main');

    /*
    admin create
    */
   // Route::get('create', function () {
   //     return view('admin.create');
   // })->name('admin.create');

    /*
    admin updateordelete
    */
    Route::get('updateordelete', function () {
        $collection = ['id'=> 1,'name' => 'le son de la rue', 'description'=>'le meilleur cd du monde, en 2020'];
        return view('admin.updateordelete', ['item' => $collection]);
    })->name('admin.updateordelete');


    /*
    admin update
    */
    Route::get('update/{id}', function () {
        return view('admin.update');
    })->name('admin.update');

    /*
    admin delete
    */
    Route::get('delete/{id}', function () {
        return view('admin.delete');
    })->name('admin.delete');


    /*
    Test de route avec un post
    */
    Route::post('create', function (Illuminate\Http\Request $request, Illuminate\Validation\Factory $validator) {
        $validation = $validator->make($request->all(), [
        'title'=>'required|min:5',
        'description'=>'required|min:3'
        ]);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation);
        }
       // return Response::json(['status'=>'it works']);
       return redirect()
       ->route('admin.main')
       ->with('info','nouvelle entrée enregistrée') . $request->input('title');
    })->name('admin.create');
});



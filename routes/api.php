<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->get('/cds', function (Request $request) {

    $data = null;

    if($request->user()->tokenCan('read'))
    {
        $data =  Cd::all();
        $response = [
            'msg'=> 'List of cd\'s',
            'askby'=>$request->user()->name,
            'cds'=>[
                $data
            ]
            ];
        return response()->json( $response, 200);
    }

    return response()->json($data, 401);

});

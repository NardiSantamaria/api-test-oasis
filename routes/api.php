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
Route::group(array('namespace' => 'Api'), function () {
    Route::get('/getData', [App\Http\Controllers\getController::class, 'Index']);
    Route::get('/getSchedule/{id}', [App\Http\Controllers\getController::class, 'gethorario']);

});
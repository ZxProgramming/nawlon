<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\NawlonApiController;
use App\Http\Controllers\license\UpdateLicenseController;
use App\Http\Controllers\users\dashboardController;
use App\Http\Controllers\users\carTransport\CarTransportController;
use Illuminate\Routing\RouteAction;

$controller_path = 'App\Http\Controllers';
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


Route::controller(LoginController::class)->group(function(){
Route::post('api_login/login','login')->name('login');
Route::post('api_login/logout','logout')->name('logout')->middleware('auth:sanctum');


});
Route::controller(dashboardController::class)->group(function () {
    Route::get('updateImage', 'updateImage')->name('updateImage');
        });
Route::controller(NawlonApiController::class)->prefix('Car')->group(function () {
    Route::get('data','carTransport')->name('carData')->middleware('auth:sanctum');
    Route::get('dataNawlon','nawlones')->name('nawlones')->middleware('auth:sanctum');
    Route::get('worker','WorkerData')->name('WorkerData')->middleware('auth:sanctum');
    Route::get('store','storeNawlon')->name('storeNawlon')->middleware('auth:sanctum');
    Route::get('maintanence','maintanenceApi')->name('maintanence')->middleware('auth:sanctum');
    Route::get('profit','totalProfits')->name('totalProfits')->middleware('auth:sanctum');

});

Route::controller(CarTransportController::class)->group(function () {
Route::get('filterNawlon','filterNawlon')->name('filterNawlon');
Route::get('filterMaintanence','filterMaintanence')->name('filterMaintanence');
Route::get('filterCarCategory','filterCarCategory')->name('filterCarCategory');

});



Route::controller(UpdateLicenseController::class)->group(function () {
    Route::get('filterCar','filterCar')->name('filterCar');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

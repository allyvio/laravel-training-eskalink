<?php

use App\Http\Controllers\Api\CustomerController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('customers', [CustomerController::class, 'getCustomers']);
Route::get('address-belongsto-customers', [CustomerController::class, 'addresBelongsToCustomers']);
Route::put('dissociate/{id}', [CustomerController::class, 'dissociate']);

Route::post('customers', [CustomerController::class, 'storeCustomer']);
Route::get('customer/{id}', [CustomerController::class, 'getCustomerById']);

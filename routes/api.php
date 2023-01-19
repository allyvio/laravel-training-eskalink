<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\LoginController;
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

// manajement
Route::get('products', [ProductController::class, 'getProducts'])->middleware('auth:api');
Route::post('products-attach', [ProductController::class, 'productAttachTag']);
Route::put('products-detach/{id}', [ProductController::class, 'productDetachTag']);
Route::put('products-sync/{id}', [ProductController::class, 'productSynchTag']);
Route::get('user-has-products', [ProductController::class, 'userHasProducts']);
Route::get('product-belongsto-user/{id}', [ProductController::class, 'productBelongsToUser']);

//auth
Route::post('login', [LoginController::class, 'login']);

Route::post('customers', [CustomerController::class, 'storeCustomer']);
Route::get('customer/{id}', [CustomerController::class, 'getCustomerById']);

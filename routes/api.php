<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => ['cors']], function () {
Route::apiResource('users', UserController::class);
Route::apiResource('invoices', InvoiceController::class);
Route::get('/csrf-token', function () {
    return response()->json(['token' => csrf_token()]);
});
Route::get('items', [ItemController::class, 'index']);
Route::get('customers', [UserController::class, 'customers']);



// });

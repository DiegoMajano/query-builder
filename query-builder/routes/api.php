<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/getOrdersById2', [UserController::class,'getOrdersById2']);
Route::get('/getOrders', [UserController::class,'getOrders']);
Route::get('/getOrdersByTotal', [UserController::class,'getOrdersByTotal']);
Route::get('/getUsersWithNameStartsR', [UserController::class,'getUsersWithNameStartsR']);
Route::get('/getAllOrdersByUser5', [UserController::class,'getAllOrdersByUser5']);
Route::get('/getAllOrdersData', [UserController::class,'getAllOrdersData']);
Route::get('/getTotalOrdersSum', [UserController::class,'getTotalOrdersSum']);
Route::get('/getCheapestOrder', [UserController::class,'getCheapestOrder']);
Route::get('/getOrderByUser', [UserController::class,'getOrderByUser']);
<?php

use App\Http\Controllers\API\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => '/user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('api.user.index');
    Route::get('/{id}', [UserController::class, 'show'])->name('api.user.show');
});

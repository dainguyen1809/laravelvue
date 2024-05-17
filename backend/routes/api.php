<?php

<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
=======
use App\Http\Controllers\API\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => '/users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('api.users.index');
    Route::get('/create', [UserController::class, 'create'])->name('api.users.create');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('api.users.update');
    Route::post('/store', [UserController::class, 'store'])->name('api.users.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('api.users.edit');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('api.users.delete');
>>>>>>> develop
});

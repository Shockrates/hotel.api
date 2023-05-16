<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
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

Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
Route::get('/room/{room}/bookings',[RoomController::class, 'getAllRoomBookings']);
Route::get('/room/{room}/reviews',[RoomController::class, 'getAllRoomReviews']);
Route::post('/roomsearch',[RoomController::class, 'searchRoom']);
Route::resource('/rooms',RoomController::class);
Route::resource('/roomtype',RoomTypeController::class);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout',[AuthController::class, 'logout']);
    Route::get('/user',[AuthController::class, 'user']);
    Route::post('/room/{room}/review',[RoomController::class, 'storeReview']);
    Route::get('/review',[ReviewController::class, 'index']);
    Route::get('/bookings',[BookingController::class, 'index']);
});


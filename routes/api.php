<?php

use App\Http\Controllers\Api\v1\LoginController;
use App\Http\Controllers\Api\v1\ProfileController;
use App\Http\Controllers\Api\v1\QuestionController;
use App\Http\Controllers\Api\v1\RegisterController;
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

Route::post('/login', [LoginController::class, 'login'])->middleware("throttle:10,2");
Route::post('/register', [RegisterController::class, 'register']);
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [ProfileController::class, 'logout']);
    Route::post('/profile', [ProfileController::class, 'getProfile']);
    Route::post('/updateProfile', [ProfileController::class, 'updateProfile']);
    Route::get('/questionList',[QuestionController::class,'questionList']);
    Route::get('/questionShow/{quesion_id}',[QuestionController::class,'questionShow']);
    Route::post('/submitQuestion',[QuestionController::class,'submitQuestion']);
});

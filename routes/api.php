<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\SubscriberController;
use App\Http\Controllers\Api\WebsiteController;
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

Route::get('/websites', [WebsiteController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);
Route::post('/subscribers', [SubscriberController::class, 'store']);

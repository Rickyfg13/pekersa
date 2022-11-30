<?php

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

//API-Notif
// Route::post('/save-token', [App\Http\Controllers\NotifController::class, 'saveToken'])
// ->name('save-token');
// Route::post('/send-notification', [App\Http\Controllers\NotifController::class, 'sendNotification'])
// ->name('send.notification');


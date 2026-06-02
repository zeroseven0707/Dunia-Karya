<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MidtransCallbackController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
 * Midtrans Payment Notification Webhook
 * URL to register in Midtrans Dashboard:
 *   https://yourdomain.com/api/midtrans/callback
 *
 * No auth middleware — Midtrans calls this server-to-server.
 * Security is handled via signature_key verification inside the controller.
 */
Route::post('/midtrans/callback', [MidtransCallbackController::class, 'callback'])
    ->name('midtrans.callback');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostcodeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/health', [PostcodeController::class, 'health']);
Route::get('/post_list', [PostcodeController::class, 'list']);
Route::post('/post_csvfileupload', [PostcodeController::class, 'csvfileupload']);

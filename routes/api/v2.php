<?php

use App\Http\Controllers\Api\V2\CompleteTaskController;
use App\Http\Controllers\Api\v2\IsActiveProductController;
use App\Http\Controllers\Api\V2\ProductController;
use App\Http\Controllers\Api\V2\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('v2')->group(function(){
    Route::apiResource('tasks', TaskController::class);
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
});

Route::middleware('auth:sanctum')->prefix('v2')->group(function(){
    Route::apiResource('products',ProductController::class);
    Route::patch('/products/{product}/is_active', IsActiveProductController::class);
});
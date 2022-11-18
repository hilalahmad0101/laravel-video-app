<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeedBackController;
use App\Http\Controllers\Admin\PostCategoriesController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\FaqController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/* A way to group routes. */

Route::prefix('admin')->group(function () {
    /* A way to group routes. */
    Route::controller(LoginController::class)->group(function () {
        /* A way to define a route. */
        Route::post('/login', 'login');
    });
});

/* A way to group routes. */
Route::middleware(['auth:sanctum'])->group(function () {
    /* A way to group routes. */
    Route::prefix('admin')->group(function () {
        /* A way to define a route. */
        Route::controller(PostController::class)->group(function () {
            /* A way to define a route. */
            /* Defining a route. */
            Route::get('/posts', 'index');
            /* Defining a route. */
            Route::post('/posts', 'store');
            /* Defining a route. */
            Route::patch('/posts/{id}', 'edit');
            /* Defining a route. */
            Route::delete('/posts/{id}', 'delete');
            /* Defining a route. */
            Route::put('/posts/{id}', 'update');
        });
        Route::controller(CategoryController::class)->group(function () {
            /* Defining a route. */
            Route::get('/categories', 'index');
            /* Defining a route. */
            Route::post('/categories', 'store');
            /* Defining a route. */
            Route::patch('/categories/{id}', 'edit');
            /* Defining a route. */
            Route::delete('/categories/{id}', 'delete');
            /* Defining a route. */
            Route::put('/categories/{id}', 'update');
        });

        /* A way to define a route. */
        Route::controller(FaqController::class)->group(function () {
            /* Defining a route. */
            Route::get('/faqs', 'index');
            Route::post('/faqs', 'store');
            Route::patch('/faqs/{id}', 'edit');
            Route::delete('/faqs/{id}', 'delete');
            Route::put('/faqs/{id}', 'update');
        });

        /* A way to define a route. */
        Route::controller(SettingController::class)->group(function () {
            /* Defining a route. */
            Route::get('/settings', 'index');
            Route::put('/settings/{id}', 'update');
            /* Defining a route. */
        });
        /* Defining a route. */
        Route::controller(FeedBackController::class)->group(function () {
            Route::get('/feedbacks', 'index');
            Route::post('/feedbacks', 'store');
        });

        /* Defining a route. */
        Route::controller(LoginController::class)->group(function () {
            /* Defining a route. */
            Route::post('/change/password', 'updatePassword');
        });


        Route::controller(PostCategoriesController::class)->group(function () {
            Route::get('/post/category', 'index');
            Route::post('/post/category', 'create');
        });
    });
});

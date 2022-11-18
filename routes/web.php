<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Livewire\Admin\Faq;
use App\Http\Livewire\Admin\FeedBack;
use App\Http\Livewire\Admin\Login;
use App\Http\Livewire\Admin\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', Login::class)->name('admin.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', Post::class)->name('admin.post');
    Route::get('/faqs', Faq::class)->name('admin.faq');
    Route::get('/feedbacks', FeedBack::class)->name('admin.feedback');
    
    Route::get('/settings', [SettingController::class,'showView'])->name('admin.setting');
    Route::post('/settings/post', [SettingController::class,'storeLink'])->name('store.link');
    Route::post('/settings/update/{id}', [SettingController::class,'updateLinks'])->name('store.update');
    Route::post('/settings/update/privacy', [SettingController::class,'updatePrivcy'])->name('store.privacy');
    Route::post('/settings/update/password', [SettingController::class,'updatePassword'])->name('admin.change.password');
    
    Route::get('/add/posts', [PostController::class, 'index'])->name('admin.add.post');
    Route::get('/edit/posts/{id}', [PostController::class, 'edit'])->name('admin.edit.post');
    Route::post('/update/posts/{id}', [PostController::class, 'update'])->name('admin.update.post');
    Route::post('/add/posts', [PostController::class, 'store']);
    Route::get('/admin/post/category', [PostController::class, 'category']);
    Route::post('/admin/create/category', [PostController::class, 'addCategory']);
});

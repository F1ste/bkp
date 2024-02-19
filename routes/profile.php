<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\SettingUserController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/profile/dashboard');
Route::get('/dashboard', [UserPageController::class, 'dashboard'])->name('dashboard');

Route::get('/notifications', [UserPageController::class, 'notifications'])->name('notifications');

Route::prefix('/setting')->group(function () {
    Route::get('/', [SettingUserController::class, 'setting'])->name('setting');
    Route::post('/update', [SettingUserController::class, 'update'])->name('setting.update');
    Route::post('/avatar', [SettingUserController::class, 'avatar'])->name('setting.avatar');
});

Route::prefix('/setting')->group(function () {
    Route::get('/', [SettingUserController::class, 'setting'])->name('setting');
    Route::post('/update', [SettingUserController::class, 'update'])->name('setting.update');
    Route::post('/avatar', [SettingUserController::class, 'avatar'])->name('setting.avatar');
});

Route::prefix('/setting')->group(function () {
    Route::get('/', [SettingUserController::class, 'setting'])->name('setting');
    Route::post('/update', [SettingUserController::class, 'update'])->name('setting.update');
    Route::post('/avatar', [SettingUserController::class, 'avatar'])->name('setting.avatar');
});

Route::prefix('/chat')->group(function () {
    Route::get('/', [ChatController::class, 'index'])->name('chat');
    Route::post('/', [ChatController::class, 'store'])->name('chat.create');
    Route::post('/sendmessage', [ChatController::class, 'sendMessage'])->name('message');
    Route::get('/getmessage', [ChatController::class, 'getMessage'])->name('message_get');
});

Route::prefix('/services')->group(function () {
    Route::get('/', [CollectionController::class, 'services'])->name('services');
    Route::get('/services-{id}', [CollectionController::class, 'single'])->name('services.single');
    Route::get('/new', [CollectionController::class, 'new'])->name('services.new');

    Route::post('/img', [CollectionController::class, 'img'])->name('services.img');

    Route::post('/store', [CollectionController::class, 'store'])->name('services.store');
    Route::post('/edit', [CollectionController::class, 'edit'])->name('services.edit');
    Route::post('/upload', [CollectionController::class, 'upload'])->name('services.upload');
    Route::post('/delete', [CollectionController::class, 'delete'])->name('services.delete');
});

Route::prefix('/feedback')->group(function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('feedback');
    Route::post('/', [FeedbackController::class,'store'])->name('feedback.create');
    Route::put('/accept-{id}', [FeedbackController::class,'accept'])->name('feedback.accept');
    Route::put('/decline-{id}', [FeedbackController::class,'decline'])->name('feedback.decline');
    Route::put('/viewed-{id}', [FeedbackController::class,'viewed'])->name('feedback.viewed');
    Route::get('/candidat-{id}', [FeedbackController::class,'candidat_index'])->name('feedback.candidat');
    Route::get('/owner-{id}', [FeedbackController::class,'owner_index'])->name('feedback.owner');
    Route::get('/owner', [FeedbackController::class,'owner_all'])->name('feedback.owner.all');
    Route::get('/candidat', [FeedbackController::class,'candidat_all'])->name('feedback.candidat.all');
});

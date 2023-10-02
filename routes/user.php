<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\AdminCollectionController;
use App\Http\Controllers\SettingUserController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\AdminPageController;
use Illuminate\Support\Facades\Route;


Route::get('/rol', [CollectionController::class, 'roles'])->name('roles');


Route::prefix('/profile')->middleware('auth')->group(function () {
    Route::get('/dashboard', [UserPageController::class, 'dashboard'])->name('profile.dashboard');

    Route::get('/notifications', [UserPageController::class, 'notifications'])->name('profile.notifications');

    Route::prefix('/setting')->group(function () {
        Route::get('/', [SettingUserController::class, 'setting'])->name('profile.setting');
        Route::post('/update', [SettingUserController::class, 'update'])->name('profile.setting.update');
        Route::post('/avatar', [SettingUserController::class, 'avatar'])->name('profile.setting.avatar');
    });

    Route::prefix('/services')->group(function () {
        Route::get('/', [CollectionController::class, 'services'])->name('profile.services');
        Route::get('/services-{id}', [CollectionController::class, 'single'])->name('profile.services.single');
        Route::get('/new', [CollectionController::class, 'new'])->name('profile.services.new');

        Route::post('/img1', [CollectionController::class, 'img1'])->name('profile.services.img1');
        Route::post('/img2', [CollectionController::class, 'img2'])->name('profile.services.img2');
        Route::post('/img3', [CollectionController::class, 'img3'])->name('profile.services.img3');
        Route::post('/img4', [CollectionController::class, 'img4'])->name('profile.services.img4');
        Route::post('/img5', [CollectionController::class, 'img5'])->name('profile.services.img5');
        Route::post('/img6', [CollectionController::class, 'img6'])->name('profile.services.img6');
        Route::post('/img7', [CollectionController::class, 'img6'])->name('profile.services.img7');

        Route::post('/store', [CollectionController::class, 'store'])->name('profile.services.store');
        Route::post('/edit', [CollectionController::class, 'edit'])->name('profile.services.edit');
        Route::post('/upload', [CollectionController::class, 'upload'])->name('profile.services.upload');
        Route::post('/delete', [CollectionController::class, 'delete'])->name('profile.services.delete');
    });
});


Route::middleware(['role:admin'])->prefix('/admin')->group(function () {
    Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('admin.dashboard');
     Route::get('/arhiv', [AdminPageController::class, 'arhiv'])->name('admin.arhiv');
      Route::get('/onpublic', [AdminPageController::class, 'onpublic'])->name('admin.onpublic');
    Route::get('/otclon', [AdminPageController::class, 'otclon'])->name('admin.otclon');

     Route::prefix('/services')->group(function () {
        Route::get('/services-{id}', [AdminCollectionController::class, 'single'])->name('admin.services.single');
        Route::post('/edit', [AdminCollectionController::class, 'edit'])->name('admin.services.edit');
    });



    Route::prefix('/news')->group(function () {
        Route::get('/', [AdminCollectionController::class, 'news'])->name('admin.news');
        Route::get('/news-{id}', [AdminCollectionController::class, 'news_single'])->name('admin.news.single');
        Route::get('/new', [AdminCollectionController::class, 'news_new'])->name('admin.news.new');
        Route::post('/img1', [CollectionController::class, 'img1'])->name('admin.news.img1');


        Route::post('/store', [AdminCollectionController::class, 'news_store'])->name('admin.news.store');
        Route::post('/edit', [AdminCollectionController::class, 'news_edit'])->name('admin.news.edit');
        Route::post('/upload', [AdminCollectionController::class, 'news_upload'])->name('admin.news.upload');
        Route::post('/delete', [AdminCollectionController::class, 'news_delete'])->name('admin.news.delete');
    });



    Route::prefix('/banners')->group(function () {
        Route::get('/', [AdminCollectionController::class, 'banners'])->name('admin.banners');
        Route::get('/banner-{id}', [AdminCollectionController::class, 'banner_single'])->name('admin.banner.single');
        Route::get('/new', [AdminCollectionController::class, 'banner_new'])->name('admin.banner.new');
        Route::post('/img1', [CollectionController::class, 'img1'])->name('admin.banner.img1');
        Route::post('/store', [AdminCollectionController::class, 'banner_store'])->name('admin.banner.store');
        Route::post('/edit', [AdminCollectionController::class, 'banner_edit'])->name('admin.banner.edit');
         Route::post('/delete', [AdminCollectionController::class, 'banner_delete'])->name('admin.banner.delete');
    });

        Route::prefix('/rubric')->group(function () {
        Route::get('/', [AdminCollectionController::class, 'rubric'])->name('admin.rubric');
        Route::get('/rubric-{id}', [AdminCollectionController::class, 'rubric_single'])->name('admin.rubric.single');
        Route::get('/new', [AdminCollectionController::class, 'rubric_new'])->name('admin.rubric.new');
        Route::post('/img1', [CollectionController::class, 'img1'])->name('admin.rubric.img1');
        Route::post('/store', [AdminCollectionController::class, 'rubric_store'])->name('admin.rubric.store');
        Route::post('/edit', [AdminCollectionController::class, 'rubric_edit'])->name('admin.rubric.edit');
         Route::post('/delete', [AdminCollectionController::class, 'rubric_delete'])->name('admin.rubric.delete');
    });

        Route::prefix('/tema')->group(function () {
        Route::get('/', [AdminCollectionController::class, 'tema'])->name('admin.tema');
        Route::get('/tema-{id}', [AdminCollectionController::class, 'tema_single'])->name('admin.tema.single');
        Route::get('/new', [AdminCollectionController::class, 'tema_new'])->name('admin.tema.new');
        Route::post('/img1', [CollectionController::class, 'img1'])->name('admin.tema.img1');
        Route::post('/store', [AdminCollectionController::class, 'tema_store'])->name('admin.tema.store');
        Route::post('/edit', [AdminCollectionController::class, 'tema_edit'])->name('admin.tema.edit');
         Route::post('/delete', [AdminCollectionController::class, 'tema_delete'])->name('admin.tema.delete');
    });


                Route::prefix('/tip')->group(function () {
        Route::get('/', [AdminCollectionController::class, 'tip'])->name('admin.tip');
        Route::get('/tip-{id}', [AdminCollectionController::class, 'tip_single'])->name('admin.tip.single');
        Route::get('/new', [AdminCollectionController::class, 'tip_new'])->name('admin.tip.new');
        Route::post('/img1', [CollectionController::class, 'img1'])->name('admin.tip.img1');
        Route::post('/store', [AdminCollectionController::class, 'tip_store'])->name('admin.tip.store');
        Route::post('/edit', [AdminCollectionController::class, 'tip_edit'])->name('admin.tip.edit');
         Route::post('/delete', [AdminCollectionController::class, 'tip_delete'])->name('admin.tip.delete');
    });



                  Route::prefix('/teg')->group(function () {
        Route::get('/', [AdminCollectionController::class, 'teg'])->name('admin.teg');
        Route::get('/teg-{id}', [AdminCollectionController::class, 'teg_single'])->name('admin.teg.single');
        Route::get('/new', [AdminCollectionController::class, 'teg_new'])->name('admin.teg.new');
        Route::post('/img1', [CollectionController::class, 'img1'])->name('admin.teg.img1');
        Route::post('/store', [AdminCollectionController::class, 'teg_store'])->name('admin.teg.store');
        Route::post('/edit', [AdminCollectionController::class, 'teg_edit'])->name('admin.teg.edit');
         Route::post('/delete', [AdminCollectionController::class, 'teg_delete'])->name('admin.teg.delete');
    });



         Route::prefix('/partners')->group(function () {
        Route::get('/', [AdminCollectionController::class, 'partners'])->name('admin.partners');
        Route::get('/partners-{id}', [AdminCollectionController::class, 'partners_single'])->name('admin.partners.single');
        Route::get('/new', [AdminCollectionController::class, 'partners_new'])->name('admin.partners.new');
        Route::post('/img1', [CollectionController::class, 'img1'])->name('admin.partners.img1');
        Route::post('/store', [AdminCollectionController::class, 'partners_store'])->name('admin.partners.store');
        Route::post('/edit', [AdminCollectionController::class, 'partners_edit'])->name('admin.partners.edit');
         Route::post('/delete', [AdminCollectionController::class, 'partners_delete'])->name('admin.partners.delete');
    });


});
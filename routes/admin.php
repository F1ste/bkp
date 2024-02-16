<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminCollectionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\Projects\EventController;
use App\Http\Controllers\Admin\Projects\SubjectController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FooterController;
use Illuminate\Support\Facades\Route;

Route::prefix('/projects')->name('projects.')->group(function () {
    Route::get('/moderation', [ProjectController::class, 'moderation'])->name('moderation');
    Route::get('/archive', [ProjectController::class, 'archive'])->name('archive');
    Route::get('/published', [ProjectController::class, 'published'])->name('public');
    Route::get('/declined', [ProjectController::class, 'declined'])->name('declined');

    Route::resource('/subjects', SubjectController::class)->except('show');
    Route::resource('/events', EventController::class)->except('show');
});

Route::prefix('/services')->group(function () {
    Route::get('/services-{id}', [AdminCollectionController::class, 'single'])->name('services.single');
    Route::post('/edit', [AdminCollectionController::class, 'edit'])->name('services.edit');
});

Route::prefix('/user')->group(function () {
    Route::get('/', [AdminUserController::class,'index'])->name('user');
    Route::get('/edit-{id}', [AdminUserController::class,'edit'])->name('user.edit');
    Route::post('{user}/update', [AdminUserController::class,'update'])->name('user.update');
});

Route::prefix('/news')->group(function () {
    Route::get('/', [AdminCollectionController::class, 'news'])->name('news');
    Route::get('/news-{id}', [AdminCollectionController::class, 'news_single'])->name('news.single');
    Route::get('/new', [AdminCollectionController::class, 'news_new'])->name('news.new');
    Route::post('/img1', [CollectionController::class, 'img1'])->name('news.img1');

    Route::post('/store', [AdminCollectionController::class, 'news_store'])->name('news.store');
    Route::post('/edit', [AdminCollectionController::class, 'news_edit'])->name('news.edit');
    Route::post('/upload', [AdminCollectionController::class, 'news_upload'])->name('news.upload');
    Route::post('/delete', [AdminCollectionController::class, 'news_delete'])->name('news.delete');
});

Route::prefix('/banners')->group(function () {
    Route::get('/', [AdminCollectionController::class, 'banners'])->name('banners');
    Route::get('/banner-{id}', [AdminCollectionController::class, 'banner_single'])->name('banner.single');
    Route::get('/new', [AdminCollectionController::class, 'banner_new'])->name('banner.new');
    Route::post('/img1', [CollectionController::class, 'img1'])->name('banner.img1');
    Route::post('/store', [AdminCollectionController::class, 'banner_store'])->name('banner.store');
    Route::post('/edit', [AdminCollectionController::class, 'banner_edit'])->name('banner.edit');
        Route::post('/delete', [AdminCollectionController::class, 'banner_delete'])->name('banner.delete');
});

Route::prefix('/rubric')->group(function () {
    Route::get('/', [AdminCollectionController::class, 'rubric'])->name('news-categories');
    Route::get('/rubric-{id}', [AdminCollectionController::class, 'rubric_single'])->name('news-categories.single');
    Route::get('/new', [AdminCollectionController::class, 'rubric_new'])->name('news-categories.new');
    Route::post('/img1', [CollectionController::class, 'img1'])->name('news-categories.img1');
    Route::post('/store', [AdminCollectionController::class, 'rubric_store'])->name('news-categories.store');
    Route::post('/edit', [AdminCollectionController::class, 'rubric_edit'])->name('news-categories.edit');
        Route::post('/delete', [AdminCollectionController::class, 'rubric_delete'])->name('news-categories.delete');
});

Route::prefix('/teg')->group(function () {
    Route::get('/', [AdminCollectionController::class, 'teg'])->name('project-tags');
    Route::get('/teg-{id}', [AdminCollectionController::class, 'teg_single'])->name('project-tags.single');
    Route::get('/new', [AdminCollectionController::class, 'teg_new'])->name('project-tags.new');
    Route::post('/img1', [CollectionController::class, 'img1'])->name('project-tags.img1');
    Route::post('/store', [AdminCollectionController::class, 'teg_store'])->name('project-tags.store');
    Route::post('/edit', [AdminCollectionController::class, 'teg_edit'])->name('project-tags.edit');
    Route::post('/delete', [AdminCollectionController::class, 'teg_delete'])->name('project-tags.delete');
});

Route::prefix('/partners')->group(function () {
    Route::get('/', [AdminCollectionController::class, 'partners'])->name('project-roles');
    Route::get('/partners-{id}', [AdminCollectionController::class, 'partners_single'])
        ->name('project-roles.single');
    Route::get('/new', [AdminCollectionController::class, 'partners_new'])->name('project-roles.new');
    Route::post('/img1', [CollectionController::class, 'img1'])->name('project-roles.img1');
    Route::post('/store', [AdminCollectionController::class, 'partners_store'])->name('project-roles.store');
    Route::post('/edit', [AdminCollectionController::class, 'partners_edit'])->name('project-roles.edit');
    Route::post('/delete', [AdminCollectionController::class, 'partners_delete'])->name('project-roles.delete');
});

Route::prefix('/about')->group(function () {
    Route::get('/', [AboutController::class,'about'])->name('about');
    Route::get('/edit-{id}', [AboutController::class,'edit'])->name('about.edit');
    Route::post('/update', [AboutController::class,'update'])->name('about.update');
    Route::post('/img', [AboutController::class, 'img'])->name('about.img');
});

Route::prefix('/faq')->group(function () {
    Route::get('/', [FAQController::class,'faq'])->name('faq');
    Route::get('/single-{id}', [FAQController::class,'edit'])->name('faq.edit');
    Route::get('/new', [FAQController::class,'create'])->name('faq.create');
    Route::post('/update', [FAQController::class,'update'])->name('faq.update');
    Route::post('/store', [FAQController::class,'store'])->name('faq.store');
    Route::post('/img', [FAQController::class, 'img'])->name('faq.img');
    Route::post('/delete', [FAQController::class, 'delete'])->name('faq.delete');
});

Route::prefix('/contact')->group(function () {
    Route::get('/', [ContactController::class,'contact'])->name('contact');
    Route::get('/edit-{contact}', [ContactController::class,'edit'])->name('contact.edit');
    Route::post('/update', [ContactController::class,'update'])->name('contact.update');
});

Route::prefix('/footer')->group(function () {
    Route::get('/', [FooterController::class,'footer'])->name('footer');
    Route::prefix('/fdescr')->group(function () {
        Route::get('/single-{id}', [FooterController::class,'fdescr_edit'])->name('fdescr.edit');
        Route::get('/new', [FooterController::class,'fdescr_create'])->name('fdescr.create');
        Route::post('/update', [FooterController::class,'fdescr_update'])->name('fdescr.update');
        Route::post('/store', [FooterController::class,'fdescr_store'])->name('fdescr.store');
        Route::post('/delete', [FooterController::class, 'fdescr_delete'])->name('fdescr.delete');
    });

    Route::prefix('/ficon')->group(function () {
        Route::get('/single-{id}', [FooterController::class,'ficon_edit'])->name('ficon.edit');
        Route::get('/new', [FooterController::class,'ficon_create'])->name('ficon.create');
        Route::post('/update', [FooterController::class,'ficon_update'])->name('ficon.update');
        Route::post('/store', [FooterController::class,'ficon_store'])->name('ficon.store');
        Route::post('/delete', [FooterController::class, 'ficon_delete'])->name('ficon.delete');
    });

    Route::prefix('/fpage')->group(function () {
        Route::get('/single-{id}', [FooterController::class,'fpage_edit'])->name('fpage.edit');
        Route::get('/new', [FooterController::class,'fpage_create'])->name('fpage.create');
        Route::post('/update', [FooterController::class,'fpage_update'])->name('fpage.update');
        Route::post('/store', [FooterController::class,'fpage_store'])->name('fpage.store');
        Route::post('/delete', [FooterController::class, 'fpage_delete'])->name('fpage.delete');
    });
});

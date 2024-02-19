<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\Projects\RoleController;
use App\Http\Controllers\AdminCollectionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\Projects\EventController;
use App\Http\Controllers\Admin\Projects\SubjectController;
use App\Http\Controllers\Admin\Projects\TagController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FooterController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/projects/moderation');

Route::prefix('/projects')->name('projects.')->group(function () {
    Route::redirect('/', '/admin/projects/moderation');
    Route::get('/moderation', [ProjectController::class, 'moderation'])->name('moderation');
    Route::get('/archive', [ProjectController::class, 'archive'])->name('archive');
    Route::get('/published', [ProjectController::class, 'published'])->name('public');
    Route::get('/declined', [ProjectController::class, 'declined'])->name('declined');

    Route::resource('/subjects', SubjectController::class)->except('show');
    Route::resource('/events', EventController::class)->except('show');
    Route::resource('/tags', TagController::class)->except('show');
    Route::resource('/roles', RoleController::class)->except('show');
});

Route::resource('/news', NewsController::class)->except('show');
Route::post('/news/img1', [CollectionController::class, 'img'])->name('news.img1');

Route::resource('/banners', BannerController::class)->except('show');
Route::post('/banners/img1', [CollectionController::class, 'img1'])->name('banner.img1');

Route::prefix('/services')->group(function () {
    Route::get('/services-{id}', [AdminCollectionController::class, 'single'])->name('services.single');
    Route::post('/edit', [AdminCollectionController::class, 'edit'])->name('services.edit');
});

Route::prefix('/user')->group(function () {
    Route::get('/', [AdminUserController::class,'index'])->name('user');
    Route::get('/edit-{id}', [AdminUserController::class,'edit'])->name('user.edit');
    Route::post('{user}/update', [AdminUserController::class,'update'])->name('user.update');
});

Route::prefix('/rubric')->group(function () {
    Route::get('/', [AdminCollectionController::class, 'rubric'])->name('news-categories');
    Route::get('/rubric-{id}', [AdminCollectionController::class, 'rubric_single'])->name('news-categories.single');
    Route::get('/new', [AdminCollectionController::class, 'rubric_new'])->name('news-categories.new');
    Route::post('/img1', [CollectionController::class, 'img'])->name('news-categories.img1');
    Route::post('/store', [AdminCollectionController::class, 'rubric_store'])->name('news-categories.store');
    Route::post('/edit', [AdminCollectionController::class, 'rubric_edit'])->name('news-categories.edit');
        Route::post('/delete', [AdminCollectionController::class, 'rubric_delete'])->name('news-categories.delete');
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

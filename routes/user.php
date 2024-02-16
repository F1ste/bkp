<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\AdminCollectionController;
use App\Http\Controllers\SettingUserController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FooterController;
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

    Route::prefix('/setting')->group(function () {
        Route::get('/', [SettingUserController::class, 'setting'])->name('profile.setting');
        Route::post('/update', [SettingUserController::class, 'update'])->name('profile.setting.update');
        Route::post('/avatar', [SettingUserController::class, 'avatar'])->name('profile.setting.avatar');
    });

    Route::prefix('/setting')->group(function () {
        Route::get('/', [SettingUserController::class, 'setting'])->name('profile.setting');
        Route::post('/update', [SettingUserController::class, 'update'])->name('profile.setting.update');
        Route::post('/avatar', [SettingUserController::class, 'avatar'])->name('profile.setting.avatar');
    });

    Route::prefix('/chat')->group(function () {
        Route::get('/', [ChatController::class, 'index'])->name('profile.chat');
        Route::post('/', [ChatController::class, 'store'])->name('profile.chat.create');
        Route::post('/sendmessage', [ChatController::class, 'sendMessage'])->name('profile.message');
        Route::get('/getmessage', [ChatController::class, 'getMessage'])->name('profile.message_get');
    });

    Route::prefix('/services')->group(function () {
        Route::get('/', [CollectionController::class, 'services'])->name('profile.services');
        Route::get('/services-{id}', [CollectionController::class, 'single'])->name('profile.services.single');
        Route::get('/new', [CollectionController::class, 'new'])->name('profile.services.new');

        Route::post('/img', [CollectionController::class, 'img'])->name('profile.services.img');

        Route::post('/store', [CollectionController::class, 'store'])->name('profile.services.store');
        Route::post('/edit', [CollectionController::class, 'edit'])->name('profile.services.edit');
        Route::post('/upload', [CollectionController::class, 'upload'])->name('profile.services.upload');
        Route::post('/delete', [CollectionController::class, 'delete'])->name('profile.services.delete');
    });

    Route::prefix('/feedback')->group(function () {
        Route::get('/', [FeedbackController::class, 'index'])->name('profile.feedback');
        Route::post('/', [FeedbackController::class,'store'])->name('profile.feedback.create');
        Route::put('/accept-{id}', [FeedbackController::class,'accept'])->name('profile.feedback.accept');
        Route::put('/decline-{id}', [FeedbackController::class,'decline'])->name('profile.feedback.decline');
        Route::put('/viewed-{id}', [FeedbackController::class,'viewed'])->name('profile.feedback.viewed');
        Route::get('/candidat-{id}', [FeedbackController::class,'candidat_index'])->name('profile.feedback.candidat');
        Route::get('/owner-{id}', [FeedbackController::class,'owner_index'])->name('profile.feedback.owner');
        Route::get('/owner', [FeedbackController::class,'owner_all'])->name('profile.feedback.owner.all');
        Route::get('/candidat', [FeedbackController::class,'candidat_all'])->name('profile.feedback.candidat.all');
    });
});

Route::middleware(['role:admin'])->prefix('/admin')->group(function () {
    Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('admin.projects.moderation');
    Route::get('/arhiv', [AdminPageController::class, 'arhiv'])->name('admin.projects.archive');
    Route::get('/onpublic', [AdminPageController::class, 'onpublic'])->name('admin.projects.public');
    Route::get('/otclon', [AdminPageController::class, 'otclon'])->name('admin.projects.declined');

    Route::prefix('/services')->group(function () {
        Route::get('/services-{id}', [AdminCollectionController::class, 'single'])->name('admin.services.single');
        Route::post('/edit', [AdminCollectionController::class, 'edit'])->name('admin.services.edit');
    });

    Route::prefix('/user')->group(function () {
        Route::get('/', [AdminUserController::class,'index'])->name('admin.user');
        Route::get('/edit-{id}', [AdminUserController::class,'edit'])->name('admin.user.edit');
        Route::post('{user}/update', [AdminUserController::class,'update'])->name('admin.user.update');
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
        Route::get('/', [AdminCollectionController::class, 'rubric'])->name('admin.news-categories');
        Route::get('/rubric-{id}', [AdminCollectionController::class, 'rubric_single'])->name('admin.news-categories.single');
        Route::get('/new', [AdminCollectionController::class, 'rubric_new'])->name('admin.news-categories.new');
        Route::post('/img1', [CollectionController::class, 'img1'])->name('admin.news-categories.img1');
        Route::post('/store', [AdminCollectionController::class, 'rubric_store'])->name('admin.news-categories.store');
        Route::post('/edit', [AdminCollectionController::class, 'rubric_edit'])->name('admin.news-categories.edit');
         Route::post('/delete', [AdminCollectionController::class, 'rubric_delete'])->name('admin.news-categories.delete');
    });

    Route::prefix('/tema')->group(function () {
        Route::get('/', [AdminCollectionController::class, 'tema'])->name('admin.project-subjects');
        Route::get('/tema-{id}', [AdminCollectionController::class, 'tema_single'])->name('admin.project-subjects.single');
        Route::get('/new', [AdminCollectionController::class, 'tema_new'])->name('admin.project-subjects.new');
        Route::post('/img1', [CollectionController::class, 'img1'])->name('admin.project-subjects.img1');
        Route::post('/store', [AdminCollectionController::class, 'tema_store'])->name('admin.project-subjects.store');
        Route::post('/edit', [AdminCollectionController::class, 'tema_edit'])->name('admin.project-subjects.edit');
        Route::post('/delete', [AdminCollectionController::class, 'tema_delete'])->name('admin.project-subjects.delete');
    });

    Route::prefix('/tip')->group(function () {
        Route::get('/', [AdminCollectionController::class, 'tip'])->name('admin.event-types');
        Route::get('/tip-{id}', [AdminCollectionController::class, 'tip_single'])->name('admin.event-types.single');
        Route::get('/new', [AdminCollectionController::class, 'tip_new'])->name('admin.event-types.new');
        Route::post('/img1', [CollectionController::class, 'img1'])->name('admin.event-types.img1');
        Route::post('/store', [AdminCollectionController::class, 'tip_store'])->name('admin.event-types.store');
        Route::post('/edit', [AdminCollectionController::class, 'tip_edit'])->name('admin.event-types.edit');
        Route::post('/delete', [AdminCollectionController::class, 'tip_delete'])->name('admin.event-types.delete');
    });

    Route::prefix('/teg')->group(function () {
        Route::get('/', [AdminCollectionController::class, 'teg'])->name('admin.project-tags');
        Route::get('/teg-{id}', [AdminCollectionController::class, 'teg_single'])->name('admin.project-tags.single');
        Route::get('/new', [AdminCollectionController::class, 'teg_new'])->name('admin.project-tags.new');
        Route::post('/img1', [CollectionController::class, 'img1'])->name('admin.project-tags.img1');
        Route::post('/store', [AdminCollectionController::class, 'teg_store'])->name('admin.project-tags.store');
        Route::post('/edit', [AdminCollectionController::class, 'teg_edit'])->name('admin.project-tags.edit');
        Route::post('/delete', [AdminCollectionController::class, 'teg_delete'])->name('admin.project-tags.delete');
    });

    Route::prefix('/partners')->group(function () {
        Route::get('/', [AdminCollectionController::class, 'partners'])->name('admin.project-roles');
        Route::get('/partners-{id}', [AdminCollectionController::class, 'partners_single'])
            ->name('admin.project-roles.single');
        Route::get('/new', [AdminCollectionController::class, 'partners_new'])->name('admin.project-roles.new');
        Route::post('/img1', [CollectionController::class, 'img1'])->name('admin.project-roles.img1');
        Route::post('/store', [AdminCollectionController::class, 'partners_store'])->name('admin.project-roles.store');
        Route::post('/edit', [AdminCollectionController::class, 'partners_edit'])->name('admin.project-roles.edit');
        Route::post('/delete', [AdminCollectionController::class, 'partners_delete'])->name('admin.project-roles.delete');
    });

    Route::prefix('/about')->group(function () {
        Route::get('/', [AboutController::class,'about'])->name('admin.about');
        Route::get('/edit-{id}', [AboutController::class,'edit'])->name('admin.about.edit');
        Route::post('/update', [AboutController::class,'update'])->name('admin.about.update');
        Route::post('/img', [AboutController::class, 'img'])->name('admin.about.img');
    });

    Route::prefix('/faq')->group(function () {
        Route::get('/', [FAQController::class,'faq'])->name('admin.faq');
        Route::get('/single-{id}', [FAQController::class,'edit'])->name('admin.faq.edit');
        Route::get('/new', [FAQController::class,'create'])->name('admin.faq.create');
        Route::post('/update', [FAQController::class,'update'])->name('admin.faq.update');
        Route::post('/store', [FAQController::class,'store'])->name('admin.faq.store');
        Route::post('/img', [FAQController::class, 'img'])->name('admin.faq.img');
        Route::post('/delete', [FAQController::class, 'delete'])->name('admin.faq.delete');
    });

    Route::prefix('/contact')->group(function () {
        Route::get('/', [ContactController::class,'contact'])->name('admin.contact');
        Route::get('/edit-{contact}', [ContactController::class,'edit'])->name('admin.contact.edit');
        Route::post('/update', [ContactController::class,'update'])->name('admin.contact.update');
    });

    Route::prefix('/footer')->group(function () {
        Route::get('/', [FooterController::class,'footer'])->name('admin.footer');
        Route::prefix('/fdescr')->group(function () {
            Route::get('/single-{id}', [FooterController::class,'fdescr_edit'])->name('admin.fdescr.edit');
            Route::get('/new', [FooterController::class,'fdescr_create'])->name('admin.fdescr.create');
            Route::post('/update', [FooterController::class,'fdescr_update'])->name('admin.fdescr.update');
            Route::post('/store', [FooterController::class,'fdescr_store'])->name('admin.fdescr.store');
            Route::post('/delete', [FooterController::class, 'fdescr_delete'])->name('admin.fdescr.delete');
        });

        Route::prefix('/ficon')->group(function () {
            Route::get('/single-{id}', [FooterController::class,'ficon_edit'])->name('admin.ficon.edit');
            Route::get('/new', [FooterController::class,'ficon_create'])->name('admin.ficon.create');
            Route::post('/update', [FooterController::class,'ficon_update'])->name('admin.ficon.update');
            Route::post('/store', [FooterController::class,'ficon_store'])->name('admin.ficon.store');
            Route::post('/delete', [FooterController::class, 'ficon_delete'])->name('admin.ficon.delete');
        });

        Route::prefix('/fpage')->group(function () {
            Route::get('/single-{id}', [FooterController::class,'fpage_edit'])->name('admin.fpage.edit');
            Route::get('/new', [FooterController::class,'fpage_create'])->name('admin.fpage.create');
            Route::post('/update', [FooterController::class,'fpage_update'])->name('admin.fpage.update');
            Route::post('/store', [FooterController::class,'fpage_store'])->name('admin.fpage.store');
            Route::post('/delete', [FooterController::class, 'fpage_delete'])->name('admin.fpage.delete');
        });
    });
});

<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\AdminCollectionController;
use App\Http\Controllers\SettingUserController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FooterController;
use App\View\Components\Footer;
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
    Route::prefix('/feedback')->group(function(){
        Route::post('/',[FeedbackController::class,'store'])->name('profile.feedback.create');
        Route::put('/accept',[FeedbackController::class,'accept'])->name('profile.feedback.accept');
        Route::put('/decline',[FeedbackController::class,'decline'])->name('profile.feedback.decline');
        Route::put('/viewed',[FeedbackController::class,'viewed'])->name('profile.feedback.viewed');
        Route::get('/candidat-{id}',[FeedbackController::class,'candidat_index'])->name('profile.feedback.candidat');
        Route::get('/owner-{id}',[FeedbackController::class,'owner_index'])->name('profile.feedback.owner');
        Route::get('/owner',[FeedbackController::class,'owner_all'])->name('profile.feedback.owner.all');
        Route::get('/candidat',[FeedbackController::class,'candidat_all'])->name('profile.feedback.candidat.all');
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

        Route::prefix('/about')->group(function(){
            Route::get('/',[AboutController::class,'about'])->name('admin.about');
            Route::get('/edit-{id}',[AboutController::class,'edit'])->name('admin.about.edit');
            Route::post('/update',[AboutController::class,'update'])->name('admin.about.update');
            Route::post('/img', [AboutController::class, 'img'])->name('admin.about.img');
        });
        Route::prefix('/faq')->group(function(){
            Route::get('/',[FAQController::class,'faq'])->name('admin.faq');
            Route::get('/single-{id}',[FAQController::class,'edit'])->name('admin.faq.edit');
            Route::get('/new',[FAQController::class,'create'])->name('admin.faq.create');
            Route::post('/update',[FAQController::class,'update'])->name('admin.faq.update');
            Route::post('/store',[FAQController::class,'store'])->name('admin.faq.store');
            Route::post('/img', [FAQController::class, 'img'])->name('admin.faq.img');
            Route::post('/delete', [FAQController::class, 'delete'])->name('admin.faq.delete');
            
        });
        Route::prefix('/contact')->group(function(){
            Route::get('/',[ContactController::class,'contact'])->name('admin.contact');
            Route::get('/edit-{id}',[ContactController::class,'edit'])->name('admin.contact.edit');
            Route::post('/update',[ContactController::class,'update'])->name('admin.contact.update');
        });

        Route::prefix('/footer')->group(function(){
            Route::get('/',[FooterController::class,'footer'])->name('admin.footer');
            Route::prefix('/fdescr')->group(function(){
                Route::get('/single-{id}',[FooterController::class,'fdescr_edit'])->name('admin.fdescr.edit');
                Route::get('/new',[FooterController::class,'fdescr_create'])->name('admin.fdescr.create');
                Route::post('/update',[FooterController::class,'fdescr_update'])->name('admin.fdescr.update');
                Route::post('/store',[FooterController::class,'fdescr_store'])->name('admin.fdescr.store');
                Route::post('/delete', [FooterController::class, 'fdescr_delete'])->name('admin.fdescr.delete');
            });
            Route::prefix('/ficon')->group(function(){
                Route::get('/single-{id}',[FooterController::class,'ficon_edit'])->name('admin.ficon.edit');
                Route::get('/new',[FooterController::class,'ficon_create'])->name('admin.ficon.create');
                Route::post('/update',[FooterController::class,'ficon_update'])->name('admin.ficon.update');
                Route::post('/store',[FooterController::class,'ficon_store'])->name('admin.ficon.store');
                Route::post('/delete', [FooterController::class, 'ficon_delete'])->name('admin.ficon.delete');
            });
            Route::prefix('/fpage')->group(function(){
                Route::get('/single-{id}',[FooterController::class,'fpage_edit'])->name('admin.fpage.edit');
                Route::get('/new',[FooterController::class,'fpage_create'])->name('admin.fpage.create');
                Route::post('/update',[FooterController::class,'fpage_update'])->name('admin.fpage.update');
                Route::post('/store',[FooterController::class,'fpage_store'])->name('admin.fpage.store');
                Route::post('/delete', [FooterController::class, 'fpage_delete'])->name('admin.fpage.delete');
            });
        });


});
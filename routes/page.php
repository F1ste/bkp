<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SearchResultsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/events', [PageController::class, 'events'])->name('events');

Route::prefix('/document')->group(function () {
    Route::get('/service', [PageController::class, 'service'])->name('page.document.service');
    Route::get('/personal', [PageController::class, 'personal'])->name('page.document.personal');
});

Route::prefix('/services')->group(function () {
    Route::get('/{id}', [PageController::class, 'services'])->name('services');
});

Route::prefix('/projects')->group(function () {
    Route::get('/', [PageController::class, 'projects'])->name('projects');
    Route::get('/project/{id}', [PageController::class, 'project'])->name('projects.project');
});

Route::prefix('/news')->group(function () {
    Route::get('/', [PageController::class, 'news'])->name('news');
    Route::get('/news/{id}', [PageController::class, 'tidings'])->name('news.tidings');
});

Route::prefix('/designer')->group(function () {
    Route::get('/{id}', [PageController::class, 'designer'])->name('designer');
});

Route::get('/partners', function () {
    return view('pages.partners', ['name' => 'partners']);
});

Route::get('/about/', [AboutController::class,'index'])->name('about');
Route::get('/contacts/', [ContactController::class,'index'])->name('contact');
Route::get('/faq/', [FAQController::class,'index'])->name('faq');
Route::get('/policy/', [PolicyController::class,'index'])->name('policy');

Route::get('storage/{filename}', [PageController::class, 'image']);

Route::get('/search', [SearchResultsController::class, 'index']);

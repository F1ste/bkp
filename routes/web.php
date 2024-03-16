<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SearchResultsController;
use App\Models\News;
use App\Models\Project;
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

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/project/{project}', fn (Project $project) => redirect()->route('projects.project', $project, 301))
    ->whereNumber('project'); // redirect old link with id to new link with slug (SEO)
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.project');

Route::get('/news', [NewsController::class, 'news'])->name('news');
Route::get('/news/news/{news}', fn (News $news) => redirect()->route('news.tidings', $news, 301))
    ->whereNumber('news'); // redirect old link with id to new link with slug (SEO)
Route::get('/news/{news:slug}', [NewsController::class, 'tidings'])->name('news.tidings');

Route::get('/about', [AboutController::class,'index'])->name('about');
Route::get('/contacts', [ContactController::class,'index'])->name('contact');
Route::get('/faq', [FAQController::class,'index'])->name('faq');
Route::get('/search', [SearchResultsController::class, 'index']);
Route::view('/partners', 'pages.partners')->name('partners');
Route::view('/policy', 'pages.privacy-policy')->name('privacy-policy');
Route::view('/privacy', 'pages.user-agreement')->name('user-agreement');
Route::view('/pravila', 'pages.rules')->name('rules');
Route::view('/mail_send', 'pages.mailing-agreement')->name('mailing-agreement');

Route::get('/rol', [CollectionController::class, 'roles'])->name('roles');
Route::get('/quick-search', [SearchResultsController::class, 'quick_search']);

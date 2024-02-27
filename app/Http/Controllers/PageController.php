<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Models\Banner;
use App\Models\Project;
use App\Models\News;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Filters\PageNewsFilter;

class PageController extends Controller
{
    /**
     * View Page Home
     */
    public function home()
    {
        $projects_total = Project::query()
            ->published()
            ->count();

        $news = News::query()
            ->orderByDesc('id')
            ->limit(6)
            ->get();

        $projects = Project::query()
            ->with('user')
            ->published()
            ->orderByDesc('date_service_from')
            ->get();

        return view('pages.front.home.home', compact('projects_total', 'projects', 'news'));
    }

    public function news(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PageNewsFilter::class, ['queryParams' => array_filter($data)]);

        $collection = News::orderByDesc('id')->filter($filter)->paginate(10);

        $years = News::distinct()->orderBy('date', 'desc')->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('Y');
        })->unique();

        $months = News::distinct()->orderBy('date', 'asc')->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->isoFormat('MMMM');
        })->unique();

        $categories = News::distinct()->orderBy('rubrica', 'asc')->pluck('rubrica')->map(function ($category) {
            return $category;
        })->unique();

        $projects = News::distinct()->orderBy('project', 'asc')->pluck('project')->map(function ($project) {
            return $project;
        })->unique();

        return view('pages.front.news.news', [
            'collections' => $collection,
            'years' => $years,
            'months' => $months,
            'categories' => $categories,
            'projects' => $projects
        ]);
    }

    public function tidings(News $news)
    {
        $banners = Banner::query()->get();

        return view('pages.front.news.tidings', [
            'collection' => $news,
            'id' => $news->id,
        ]);
    }
}

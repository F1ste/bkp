<?php

namespace App\Http\Controllers;

use App\Http\Filters\PageNewsFilter;
use App\Http\Requests\FilterRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NewsController extends Controller
{
    public function news(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PageNewsFilter::class, ['queryParams' => array_filter($data)]);

        $collection = News::query()
            ->orderByPozits()
            ->orderByDesc('id')
            ->filter($filter)
            ->paginate(10);

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
        return view('pages.front.news.tidings', [
            'collection' => $news,
            'id' => $news->id,
        ]);
    }
}

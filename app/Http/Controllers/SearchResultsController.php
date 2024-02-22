<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Models\Project;
use App\Models\News;
use App\Models\Subject;
use Carbon\Carbon;

class SearchResultsController extends Controller
{
    public function index(FilterRequest $request)
    {
        $searchText = $request->searchText;

        $years = Project::query()
            ->where('status', Project::STATUS_PUBLISHED)
            ->distinct()
            ->orderBy('date_service_from', 'desc')
            ->pluck('date_service_from')
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y');
            })
            ->unique();

        $projects = Project::query()
            ->where('status', Project::STATUS_PUBLISHED)
            ->where('name_proj', 'like', "%{$searchText}%")
            ->orderByDesc('id')
            ->get();

        $event_type = Subject::distinct()->orderBy('name', 'asc')->pluck('name')->map(function ($event_type) {
            return $event_type;
        })->unique();


        $news = News::orderByDesc('id')->where('name', 'like', "%{$searchText}%")->get();

        $categories = News::distinct()->orderBy('rubrica', 'asc')->pluck('rubrica')->map(function ($category) {
            return $category;
        })->unique();

        return view('pages.search', compact(
            'projects',
            'news',
            'searchText',
            'years',
            'event_type',
            'categories'
        )
        );
    }

    public function quick_search(FilterRequest $request)
    {
        $projects = Project::query()
            ->where('status', Project::STATUS_PUBLISHED)
            ->where('name_proj', 'like', "%{$request->searchText}%")
            ->orderByDesc('id')
            ->get();

        $news = News::orderByDesc('id')->where('name', 'like', "%{$request->searchText}%")->get();

        $response = [
            'news' => $news,
            'collections' => $projects,
        ];
        return response()->json($response);
    }
}

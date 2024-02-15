<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Models\Project;
use App\Models\News;

class SearchResultsController extends Controller
{
    public function index(FilterRequest $request)
    {
        $collection = Project::query()
            ->where('status', Project::STATUS_PUBLISHED)
            ->where('name_proj', 'like', "%{$request->searchText}%")
            ->orderByDesc('id')
            ->get();

        $news = News::orderByDesc('id')->where('name', 'like', "%{$request->searchText}%")->get();

        $response = [
            'news' => $news,
            'collections' => $collection,
        ];
        return response()->json($response);
    }
}

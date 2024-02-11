<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Models\Collection;
use App\Models\News;

class SearchResultsController extends Controller
{
    public function index(FilterRequest $request)
    {
        $collection = Collection::query()
            ->where('price', 1)
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

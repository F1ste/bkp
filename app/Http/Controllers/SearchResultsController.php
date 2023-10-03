<?php

namespace App\Http\Controllers;

use App\Http\Filters\GlobalSearch;
use App\Http\Requests\FilterRequest;
use App\Models\Collection;
use App\Models\News;
use Illuminate\Http\Request;

class SearchResultsController extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        
        $filter = app()-> make(GlobalSearch::class, ['queryParams' => array_filter($data)]);
        
        $collection = Collection::where('price', 1)->orderByDesc('id')->filter($filter)->get();

        $news = News::orderByDesc('id')->filter($filter)->get();
        //dd($collection);
        $response = [
            'news' => $news,
            'collections' => $collection,
        ];
        return response()->json($response);

    }
}

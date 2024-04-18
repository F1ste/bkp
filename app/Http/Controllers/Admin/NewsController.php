<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\NewsFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Banner;
use App\Models\News;
use App\Models\News\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(FilterRequest $request)
    {
        $filter = app()->make(NewsFilter::class, [
            'queryParams' => array_filter($request->validated())
        ]);

        $collection = News::query()
            ->orderByGlav()
            ->orderByDesc('created_at')
            ->filter($filter)
            ->paginate(15);

        $projects = News::query()->distinct()->orderBy('project')->pluck('project')->unique();

        $newsr = Category::get();

        return view('pages.admin.news.news', [
            'collections' => $collection,
            'newsr' => $newsr,
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.admin.news.new', [
            'collection' => Project::all(),
            'newsr' => Category::all(),
            'banner' => Banner::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->date
            ? Carbon::parse($request->date)->format('Y-m-d')
            : Carbon::now()->format('Y-m-d');

        $collection = News::create([
            'name' => $request->name,
            'img' => $request->img1,
            'pod_text' => $request->pod_text,
            'text' => $request->text,
            'date' => $date,
            'project' => $request->project,
            'rubrica' => $request->rubrica,
            'banner' => $request->banner,
            'glav' => $request->glav,
            'pozits' => $request->pozits,
            'img2' => $request->img2,
            'img3' => $request->img3,
            'img4' => $request->img4,
            'img5' => $request->img5,
            'img6' => $request->img6,
            'img7' => $request->img7,
            'video' => $request->video,
        ]);

        return response()->json(route('admin.news.edit', $collection), 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\View\View
     */
    public function edit(News $news)
    {
        return view('pages.admin.news.edit', [
            'collection' => $news,
            'id' => $news->id,
            'collections' => Project::all(),
            'newsr' => Category::all(),
            'banner' => Banner::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $date = $request->date
            ? Carbon::parse($request->date)->format('Y-m-d')
            : Carbon::now()->format('Y-m-d');

        $collection = $news->update([
            'name' => $request->name,
            'img' => $request->img1,
            'pod_text' => $request->pod_text,
            'text' => $request->text,
            'date' => $date,
            'project' => $request->project,
            'rubrica' => $request->rubrica,
            'banner' => $request->banner,
            'glav' => $request->glav,
            'pozits' => $request->pozits,
            'img2' => $request->img2,
            'img3' => $request->img3,
            'img4' => $request->img4,
            'img5' => $request->img5,
            'img6' => $request->img6,
            'img7' => $request->img7,
            'video' => $request->video,
        ]);

        return response()->json($collection, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     */
    public function destroy(News $news)
    {
        return $news->delete();
    }
}

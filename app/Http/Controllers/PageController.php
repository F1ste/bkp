<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Models\Banner;
use App\Models\Collection;
use App\Models\User;
use App\Models\News;
use App\Models\Roles;
use App\Models\Subject;
use App\Models\Tags;
use App\Models\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Filters\PageNewsFilter;
use App\Http\Filters\PageProjectsFilter;

class PageController extends Controller
{
    /**
     * View Page Home
     */
    public function home()
    {
        $news = News::orderByDesc('id')->get();
        $collections = Collection::where('price', '1')->orderByDesc('id')->get();
        $userIds = $collections->pluck('user_id')->unique();
        $users = User::whereIn('id', $userIds)->get();
        return view('pages.front.home.home', compact('collections', 'news', 'users'));
    }

    /**
     * View Page Events
     */
    public function events()
    {
        return view('pages.front.events.events');
    }

    /**
     * View Image
     */
    public function image($filename)
    {
        $filename = str_replace('JPG', 'jpg', $filename);

        $path = storage_path('app/img/' . $filename);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    /**
     * View Page Service
     */
    public function service()
    {
        return view('pages.front.document.service');
    }

    /**
     * View Page Service
     */
    public function personal()
    {
        return view('pages.front.document.personal');
    }

    /**
     * View Page Designer
     */
    public function designer($id)
    {
        $designer = User::where('id', $id)->get();
        $collection = Collection::where('user_id', $id)->get();

        if (count($designer) > 0) {
            $designer = $designer[0];

            return view('pages.front.designer.designer', [
                'designer' => $designer,
                'collection' => $collection
            ]);
        } else {
            return redirect(route('home'));
        }
    }

    public function projects(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PageProjectsFilter::class, ['queryParams' => array_filter($data)]);

        $collection = Collection::where('price', 1)->orderByDesc('id')->filter($filter)->paginate(12);

        $years = Collection::query()
            ->where('price', 1)
            ->distinct()
            ->orderBy('date_service_from', 'desc')
            ->pluck('date_service_from')
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y');
            })
            ->unique();

        $months = Collection::query()
            ->distinct()
            ->orderBy('date_service_from', 'asc')
            ->pluck('date_service_from')
            ->map(function ($date) {
                return Carbon::parse($date)->isoFormat('MMMM');
            })
            ->unique();

        $eventType = Subject::distinct()->orderBy('name', 'asc')->pluck('name')->map(function ($eventType) {
            return $eventType;
        })->unique();

        $tema = Event::distinct()->orderBy('name', 'asc')->pluck('name')->map(function ($tema) {
            return $tema;
        })->unique();

        $teg = Tags::distinct()->orderBy('name', 'asc')->pluck('name')->map(function ($teg) {
            return $teg;
        })->unique();

        $roles = Roles::distinct()->orderBy('name', 'asc')->pluck('name')->map(function ($roles) {
            return $roles;
        })->unique();

        $userIds = $collection->pluck('user_id')->unique();
        $users = User::whereIn('id', $userIds)->get();

        return view('pages.front.projects.projects', [
            'collections' => $collection,
            'years' => $years,
            'months' => $months,
            'event_type' => $eventType,
            'tema' => $tema,
            'teg' => $teg,
            'roles' => $roles,
            'users' => $users,
        ]);
    }

    public function project($id)
    {
        $collection = Collection::with('feedbacks')->find($id);
        $count = $collection->feedbacks->count();
        $user = User::find($collection->user_id);
        $images = json_decode($collection->images)->images;
        $teg = json_decode($collection->teg);
        $serch = json_decode($collection->serch);

        return view('pages.front.projects.project', [
            'collection' => $collection,
            'images' => $images,
            'id' => $id,
            'teg' => $teg,
            'serch' => $serch,
            'user' => $user,
            'counter' => $count,
        ]);
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

    public function tidings($id)
    {
        $collection = News::find($id);
        $banners = Banner::query()->get();

        return view('pages.front.news.tidings', [
            'collection' => $collection,
            'id' => $id,
        ]);
    }
}

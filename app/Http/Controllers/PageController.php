<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Models\Banner;
use App\Models\Project;
use App\Models\User;
use App\Models\News;
use App\Models\Role;
use App\Models\Subject;
use App\Models\Tag;
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

    public function projects(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PageProjectsFilter::class, ['queryParams' => array_filter($data)]);

        $collection = Project::query()
            ->where('status', Project::STATUS_PUBLISHED)
            ->orderByDesc('id')
            ->filter($filter)
            ->paginate(12);

        $years = Project::query()
            ->where('status', Project::STATUS_PUBLISHED)
            ->distinct()
            ->orderBy('date_service_from', 'desc')
            ->pluck('date_service_from')
            ->map(function ($date) {
                return Carbon::parse($date)->format('Y');
            })
            ->unique();

        $months = Project::query()
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

        $teg = Tag::distinct()->orderBy('name', 'asc')->pluck('name')->map(function ($teg) {
            return $teg;
        })->unique();

        $roles = Role::distinct()->orderBy('name', 'asc')->pluck('name')->map(function ($roles) {
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

    public function project(Project $project)
    {
        $project->load('feedbacks');
        $count = $project->feedbacks->count();
        $user = User::find($project->user_id);
        $images = json_decode($project->images)->images;
        $teg = json_decode($project->teg);
        $serch = collect(json_decode($project->serch))
            ->sort(function ($a, $b) {
                return Carbon::parse($a->inp)->lt(Carbon::parse($b->inp));
            })
            ->values();

        return view('pages.front.projects.project', [
            'collection' => $project,
            'images' => $images,
            'id' => $project->id,
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

    public function tidings(News $news)
    {
        $banners = Banner::query()->get();

        return view('pages.front.news.tidings', [
            'collection' => $news,
            'id' => $news->id,
        ]);
    }
}

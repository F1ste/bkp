<?php

namespace App\Http\Controllers;

use App\Http\Filters\PageProjectsFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Event;
use App\Models\Project;
use App\Models\Role;
use App\Models\Subject;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProjectController extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(PageProjectsFilter::class, ['queryParams' => array_filter($data)]);

        $collection = Project::query()
            ->where('status', Project::STATUS_PUBLISHED)
            ->orderBy('order')
            ->orderByDesc('created_at')
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
            ->published()
            ->selectRaw('MONTH(date_service_from) as month')
            ->distinct()
            ->get()
            ->map(function ($row) {
                $date = Carbon::create(null, $row['month']);
                return [
                    'number' => $date->month,
                    'name' => $date->isoFormat('MMMM'),
                ];
            })
            ->pluck('name', 'number')
            ->sortKeys();

        $eventType = Project::query()
            ->published()
            ->select('tema')
            ->distinct()
            ->pluck('tema')
            ->filter()
            ->sort();

        $tema = Project::query()
            ->published()
            ->select('tip')
            ->distinct()
            ->pluck('tip')
            ->filter()
            ->sort();

        $teg = Project::query()
            ->published()
            ->select('teg')
            ->pluck('teg')
            ->map(function ($tag) {
                return json_decode($tag, true);
            })
            ->flatten()
            ->unique()
            ->sort();

        $roles = Project::query()
            ->published()
            ->select('serch')
            ->pluck('serch')
            ->map(function ($serch) {
                $roles = json_decode($serch, true);
                return array_column($roles, 'sel');
            })
            ->flatten()
            ->unique()
            ->filter()
            ->sort();

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

    public function show(Project $project)
    {
        $project->load('feedbacks');
        $images = json_decode($project->images)->images;
        $teg = json_decode($project->teg);
        $serch = collect(json_decode($project->serch))
            ->sort(function ($a, $b) {
                return Carbon::parse($a->inp)->lt(Carbon::parse($b->inp));
            })
            ->values();

        return view('pages.front.projects.project', [
            'project' => $project,
            'images' => $images,
            'id' => $project->id,
            'teg' => $teg,
            'serch' => $serch,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\News;
use Illuminate\Support\Facades\Response;

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
            ->orderByGlav()
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        $projects = Project::query()
            ->with('user')
            ->published()
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->get();

        return view('pages.front.home.home', compact('projects_total', 'projects', 'news'));
    }
}

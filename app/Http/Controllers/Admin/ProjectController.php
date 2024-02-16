<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * View Page Dashboard
     */
    public function moderation()
    {
        $collections = Project::onModeration()->orderByDesc('id')->get();
        return view('pages.admin.dashboard', compact('collections'));
    }

    public function archive()
    {
        $collections = Project::archived()->orderByDesc('id')->get();
        return view('pages.admin.dashboard2', compact('collections'));
    }

    public function published()
    {
        $collections = Project::published()->orderByDesc('id')->get();
        return view('pages.admin.dashboard1', compact('collections'));
    }

    public function declined()
    {
        $collections = Project::declined()->orderByDesc('id')->get();
        return view('pages.admin.dashboard3', compact('collections'));
    }
}

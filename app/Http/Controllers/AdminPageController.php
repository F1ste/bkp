<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    /**
     * View Page Dashboard
     */
    public function dashboard()
    {
        $collections = Project::where('price', 0)->orderByDesc('id')->get();

        return view('pages.admin.dashboard', [
            'collections' => $collections,
        ]);
    }

    public function arhiv()
    {
        $collections = Project::where('price', 2)->orderByDesc('id')->get();

        return view('pages.admin.dashboard2', [
            'collections' => $collections,
        ]);
    }

    public function onpublic()
    {
        $collections = Project::where('price', 1)->orderByDesc('id')->get();

        return view('pages.admin.dashboard1', [
            'collections' => $collections,
        ]);
    }

    public function otclon()
    {
        $collections = Project::where('price', 3)->orderByDesc('id')->get();

        return view('pages.admin.dashboard3', [
            'collections' => $collections,
        ]);
    }
}

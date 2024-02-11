<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    /**
     * View Page Dashboard
     */
    public function dashboard()
    {
        $collections = Collection::where('price', 0)->orderByDesc('id')->get();

        return view('pages.admin.dashboard', [
            'collections' => $collections,
        ]);
    }

    public function arhiv()
    {
        $collections = Collection::where('price', 2)->orderByDesc('id')->get();

        return view('pages.admin.dashboard2', [
            'collections' => $collections,
        ]);
    }

    public function onpublic()
    {
        $collections = Collection::where('price', 1)->orderByDesc('id')->get();

        return view('pages.admin.dashboard1', [
            'collections' => $collections,
        ]);
    }

    public function otclon()
    {
        $collections = Collection::where('price', 3)->orderByDesc('id')->get();

        return view('pages.admin.dashboard3', [
            'collections' => $collections,
        ]);
    }
}

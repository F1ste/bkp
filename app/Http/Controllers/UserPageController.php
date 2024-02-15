<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Notifications;
use Illuminate\Http\Request;

class UserPageController extends Controller
{
    /**
     * View Page Dashboard
     */
    public function dashboard()
    {
        $collections = Project::where('user_id', auth()->user()->id)->orderByDesc('id')->get();
        $notifications = Notifications::where('id_uzer', auth()->user()->id)->orderByDesc('id')->get();

        return view('pages.user.dashboard', [
            'collections' => $collections,
            'notifications' => $notifications,
        ]);
    }

    public function notifications()
    {
        $collections = Project::where('user_id', auth()->user()->id)->orderByDesc('id')->get();
        $notifications = Notifications::where('id_uzer', auth()->user()->id)->orderByDesc('id')->get();

        return view('pages.user.notifications', [
            'collections' => $collections,
            'notifications' => $notifications,
        ]);
    }
}

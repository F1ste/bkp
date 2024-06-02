<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $data = Cache::remember('statistics', 60, function () {
            return [
                'users_registred' => User::count(),
                'users_registred_today' => User::where('created_at', '>', now()->startOfDay())->count(),
                'users_registred_week' => User::where('created_at', '>', now()->subWeek()->startOfDay())->count(),
                'users_registred_month' => User::where('created_at', '>', now()->subDays(30)->startOfDay())->count(),

                'projects' => Project::count(),
                'projects_today' => Project::where('created_at', '>', now()->startOfDay())->count(),
                'projects_week' => Project::where('created_at', '>', now()->subWeek()->startOfDay())->count(),
                'projects_month' => Project::where('created_at', '>', now()->subDays(30)->startOfDay())->count(),
                'projects_archived' => Project::archived()->count(),
                'projects_on_moderation' => Project::onModeration()->count(),
                'projects_published' => Project::published()->count(),
                'projects_declined' => Project::declined()->count(),
                'projects_drafts' => Project::onlyDrafts()->count(),

                'feedbacks' => Feedback::count(),
                'feedbacks_accepted' => Feedback::where('status', 1)->count(),
                'feedbacks_declined' => Feedback::where('status', 2)->count(),
                'feedbacks_not_answered' => Feedback::whereNotIn('status', [1, 2])->count(),
                'feedbacks_today' => Feedback::where('created_at', '>', now()->startOfDay())->count(),
                'feedbacks_week' => Feedback::where('created_at', '>', now()->subWeek()->startOfDay())->count(),
                'feedbacks_month' => Feedback::where('created_at', '>', now()->subDays(30)->startOfDay())->count(),
            ];
        });

        $data['users_without_projects'] = User::doesntHave('projects')->paginate(30);

        return view('pages.admin.statistic.index', $data);
    }
}

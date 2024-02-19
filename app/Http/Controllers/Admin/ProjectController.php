<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Notifications;
use App\Models\Project;
use App\Models\Region;
use App\Models\Role;
use App\Models\Subject;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

    public function create(Request $request)
    {
        $regoin = Region::get();
        $roles = Role::get();
        $subject = Subject::get();
        $tegs = Tags::get();
        $event = Event::get();

        return view('pages.admin.services.new', [
            'region' => $regoin,
            'roles' => $roles,
            'subject' => $subject,
            'tegs' => $tegs,
            'event' => $event
        ]);
    }

    public function store(Request $request)
    {
        $collection = Project::create([
            'name' => $request->name,
            'images' => $request->images,
            'user_id' => auth()->user()->id,
            'excerpt' => $request->excerpt,
            'date_service_from' => Carbon::parse($request->date_service_from)->format('Y-m-d'),
            'date_service_to' => Carbon::parse($request->date_service_to)->format('Y-m-d'),
            'status' => $request->price,
            'created_at' => date('Y-m-d'),
            'region' => $request->region,
            'tip' => $request->tip,
            'teg' => $request->teg,
            'tema' => $request->tema,
            'tel' => $request->tel,
            'email' => $request->email,
            'name_proj' => $request->name_proj,
            'video' => $request->video,
            'serch' => $request->serch,
            'img1' => $request->img1,
            'img2' => $request->img2,
            'img3' => $request->img3,
            'img4' => $request->img4,
            'img5' => $request->img5,
            'img6' => $request->img6,
        ]);

        return response()->json(route('pages.admin.services.edit', $collection), 201);
    }

    public function edit(Request $request, Project $project)
    {
        $user = $project->user;

        return view('pages.admin.services.edit', [
            'collection' => $project,
            'images' => json_decode($project->images)->images,
            'id' => $project->id,
            'teg' => json_decode($project->teg),
            'serch' => json_decode($project->serch),
            'user' => $user,
            'region' => Region::all(),
            'roles' => Role::all(),
            'subject' => Subject::all(),
            'tegs' => Tags::all(),
            'event' => Event::all(),
            'id_uzer' => $user->id
        ]);
    }

    public function update(Request $request, Project $project)
    {
        if (in_array($request->price, [1, 2, 3])) {
            $action = [
                1 => 'опубликован!',
                2 => 'перенесен в архив.',
                3 => 'отклонен.',
            ][$request->price];

            Notifications::create([
                'id_uzer' => $request->idu,
                'id_project' => $request->id,
                'name' => "Проект {$request->name} {$action}",
            ]);
        }

        $collection = $project->update([
            'status' => $request->price
        ]);

        return response()->json($collection, 201);
    }

    public function upload(Request $request)
    {
        $size = $request->file('file')->getSize();
        $type = $request->file('file')->extension();
        $name = $size . '_' . 'image' . '.' . $type;
        $request->file('file')->storeAs(
            'img',
            $name
        );

        $link = '/storage/' . $name;
        return $link;
    }
}

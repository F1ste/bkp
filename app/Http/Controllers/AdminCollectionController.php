<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\News;
use App\Models\Region;
use App\Models\Role;
use App\Models\Subject;
use App\Models\Tags;
use App\Models\Event;
use App\Models\Newsr;
use App\Models\Banner;
use App\Models\Notifications;
use Illuminate\Http\Request;
use App\Http\Requests\FilterRequest;
use App\Http\Filters\NewsFilter;
use Illuminate\Support\Carbon;

class AdminCollectionController extends Controller
{
    /**
     * View Page Collection
     */
    public function services()
    {
        $collection = Project::where('user_id', auth()->user()->id)->get();

        return view('pages.user.services.services', [
            'collection' => $collection
        ]);
    }

    /**
     * View Page Single
     */
    public function single($id)
    {
        $collection = Project::find($id);

        if (is_null($collection)) {
            return redirect(route('pages.admin.services.new'));
        }

        $user = User::find($collection->user_id);

        $regoin = Region::get();
        $roles = Role::get();
        $subject = Subject::get();
        $tegs = Tags::get();
        $event = Event::get();

        $images = json_decode($collection->images)->images;
        $teg = json_decode($collection->teg);
        $serch = json_decode($collection->serch);

        return view('pages.admin.services.edit', [
            'collection' => $collection,
            'images' => $images,
            'id' => $id,
            'teg' => $teg,
            'serch' => $serch,
            'user' => $user,
            'region' => $regoin,
            'roles' => $roles,
            'subject' => $subject,
            'tegs' => $tegs,
            'event' => $event,
            'id_uzer' => $user->id
        ]);
    }

    /**
     * View Page Collection New
     */
    public function new()
    {
        return view('pages.user.services.new');
    }

    /**
     * POST Upload Image
     */
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

    /**
     * POST Store Collection
     */
    public function store(Request $request)
    {
        $collection = Project::create([
            'name' => $request->name,
            'images' => $request->images,
            'user_id' => auth()->user()->id,
            'excerpt' => $request->excerpt,
            'date_service_from' => $request->date_service_from,
            'date_service_to' => $request->date_service_to,
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
        ]);

        return response()->json(route('profile.services.single', ['id' => $collection->id]), 201);
    }

    /**
     * POST Update Collection
     */
    public function edit(Request $request)
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

        $collection = Project::where('id', $request->id)->update([
            'status' => $request->price
        ]);

        return response()->json($collection, 201);
    }

    public function img1(Request $request)
    {
        $size = $request->file('file')->getSize();
        $type = $request->file('file')->extension();
        $name = $size . '_' . 'image' . '.' . $type;
        $request->file('file')->storeAs(
            'public',
            $name
        );

        $link = '/storage/' . $name;
        return $link;
    }

    public function rubric()
    {
        $collection = Newsr::get();

        return view('pages.admin.rubric.rubric', [
            'collections' => $collection
        ]);
    }

    public function rubric_new()
    {
        return view('pages.admin.rubric.new');
    }

    public function rubric_store(Request $request)
    {
        $collection = Newsr::create([
            'name' => $request->name,
        ]);

        return response()->json(route('admin.news-categories.single', ['id' => $collection->id]), 201);
    }

    public function rubric_single($id)
    {
        $collection = Newsr::find($id);

        if (is_null($collection)) {
            return redirect(route('pages.admin.rubric.new'));
        }

        return view('pages.admin.rubric.edit', [
            'collection' => $collection,
            'id' => $id,
        ]);
    }


    public function rubric_delete(Request $request)
    {
        Newsr::where('id', $request->id)->delete();

        return true;
    }

    public function rubric_edit(Request $request)
    {
        $collection = Newsr::where('id', $request->id)->update([
            'name' => $request->name,
        ]);

        return response()->json($collection, 201);
    }
}

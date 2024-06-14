<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Notifications;
use App\Models\Region;
use App\Models\Role;
use App\Models\Subject;
use App\Models\Tag;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CollectionController extends Controller
{
    /**
     * View Page Collection
     */
    public function services()
    {
        $collections = Project::where('user_id', auth()->user()->id)->orderByDesc('id')->get();
        $notifications = Notifications::where('id_uzer', auth()->user()->id)->orderByDesc('id')->get();

        return view('pages.user.services.services', [
            'collections' => $collections,
            'notifications' => $notifications,
        ]);
    }

    /**
     * View Page Single
     */
    public function single($id)
    {
        $collection = Project::find($id);

        if (is_null($collection)) {
            return redirect(route('pages.user.services.new'));
        }

        $regoin = Region::get();
        $roles = Role::get();
        $subject = Subject::get();
        $tegs = Tag::get();
        $event = Event::get();
        $images = json_decode($collection->images)->images;
        $teg = json_decode($collection->teg);
        $serch = json_decode($collection->serch);

        return view('pages.user.services.edit', [
            'collection' => $collection,
            'images' => $images,
            'id' => $id,
            'teg' => $teg,
            'serch' => $serch,
            'region' => $regoin,
            'roles' => $roles,
            'subject' => $subject,
            'tegs' => $tegs,
            'event' => $event
        ]);
    }

    /**
     * View Page Collection New
     */
    public function new()
    {
        $regoin = Region::get();
        $roles = Role::get();
        $subject = Subject::get();
        $tegs = Tag::get();
        $event = Event::get();

        return view('pages.user.services.new', [
            'region' => $regoin,
            'roles' => $roles,
            'subject' => $subject,
            'tegs' => $tegs,
            'event' => $event
        ]);
    }


    /**
     * View Page Collection New
     */
    public function roles()
    {
        $roles = Role::get();
        return $roles;
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
        $request->validate([
            'name_proj' => ['string', 'max:46']
        ]);

        $collection = Project::create([
            'name' => $request->name,
            'images' => $request->images,
            'user_id' => auth()->user()->id,
            'excerpt' => $request->excerpt,
            'date_service_from' => Carbon::parse($request->date_service_from)->format('Y-m-d'),
            'date_service_to' => Carbon::parse($request->date_service_to)->format('Y-m-d'),
            'status' => $request->price,
            'created_at' => Carbon::now(),
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
            'is_project_name_hidden' => $request->is_project_name_hidden,
            'is_organization_hidden' => $request->is_organization_hidden,
        ]);

        return response()->json(route('profile.services.single', ['id' => $collection->id]), 201);
    }

    /**
     * POST Update Collection
     */
    public function edit(Request $request)
    {
        $request->validate([
            'name_proj' => ['string', 'max:46']
        ]);
        $collection = Project::where('id', $request->id)->update([
            'name' => $request->name,
            'images' => $request->images,
            'user_id' => auth()->user()->id,
            'excerpt' => $request->excerpt,
            'date_service_from' => Carbon::parse($request->date_service_from)->format('Y-m-d'),
            'date_service_to' => Carbon::parse($request->date_service_to)->format('Y-m-d'),
            'status' => $request->price,
            'updated_at' => Carbon::now(),
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
            'is_project_name_hidden' => $request->is_project_name_hidden,
            'is_organization_hidden' => $request->is_organization_hidden,
        ]);

        return response()->json($collection, 201);
    }

    /**
     * POST Avatar
     */
    public function img(Request $request)
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

    public function img7(Request $request)
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
}

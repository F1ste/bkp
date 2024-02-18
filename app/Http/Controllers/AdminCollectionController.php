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

    public function news(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(NewsFilter::class, ['queryParams' => array_filter($data)]);

        $collection = News::filter($filter)->paginate(3);

        $projects = News::distinct()->orderBy('project', 'asc')->pluck('project')->map(function ($project) {
            return $project;
        })->unique();

        $newsr = Newsr::get();

        return view('pages.admin.news.news', [
            'collections' => $collection,
            'newsr' => $newsr,
            'projects' => $projects
        ]);
    }

    /**
     * View Page Single
     */
    public function news_single($id)
    {
        $collection = News::find($id);

        if (is_null($collection)) {
            return redirect(route('pages.admin.news.new'));
        }

        $collections = Project::get();
        $newsr = Newsr::get();
        $banner = Banner::get();

        return view('pages.admin.news.edit', [
            'collection' => $collection,
            'id' => $id,
            'collections' => $collections,
            'newsr' => $newsr,
            'banner' => $banner,
        ]);
    }

    /**
     * View Page Collection New
     */
    public function news_new()
    {
        $collection = Project::get();
        $newsr = Newsr::get();
        $banner = Banner::get();
        return view('pages.admin.news.new', [
            'collection' => $collection,
            'newsr' => $newsr,
            'banner' => $banner,
        ]);
    }

    public function news_store(Request $request)
    {
        if ($request->date != '') {
            $dat = Carbon::parse($request->date)->format('Y-m-d');
        } else {
            $dat = Carbon::now()->format('Y-m-d');
        }

        $collection = News::create([
            'name' => $request->name,
            'img' => $request->img1,
            'pod_text' => $request->pod_text,
            'text' => $request->text,
            'date' => $dat,
            'project' => $request->project,
            'rubrica' => $request->rubrica,
            'banner' => $request->banner,
            'glav' => $request->glav,
            'pozits' => $request->pozits,
            'img2' => $request->img2,
            'img3' => $request->img3,
            'img4' => $request->img4,
            'img5' => $request->img5,
            'img6' => $request->img6,
            'img7' => $request->img7,
            'video' => $request->video,
        ]);

        return response()->json(route('admin.news.single', ['id' => $collection->id]), 201);
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


    public function news_edit(Request $request)
    {
        if ($request->date != '') {
            $dat = Carbon::parse($request->date)->format('Y-m-d');
        } else {
            $dat = Carbon::now()->format('Y-m-d');
        }

        $collection = News::where('id', $request->id)->update([
            'name' => $request->name,
            'img' => $request->img1,
            'pod_text' => $request->pod_text,
            'text' => $request->text,
            'date' => $dat,
            'project' => $request->project,
            'rubrica' => $request->rubrica,
            'banner' => $request->banner,
            'glav' => $request->glav,
            'pozits' => $request->pozits,
            'img2' => $request->img2,
            'img3' => $request->img3,
            'img4' => $request->img4,
            'img5' => $request->img5,
            'img6' => $request->img6,
            'img7' => $request->img7,
            'video' => $request->video,
        ]);

        return response()->json($collection, 201);
    }

    public function news_delete(Request $request)
    {
        News::where('id', $request->id)->delete();

        return true;
    }

    public function banners()
    {
        $collection = Banner::get();

        return view('pages.admin.baner.baner', [
            'collections' => $collection
        ]);
    }

    public function banner_new()
    {
        return view('pages.admin.baner.new');
    }

    public function banner_store(Request $request)
    {
        $collection = Banner::create([
            'name' => $request->name,
            'img' => $request->img1,
            'advertisement' => boolval($request->advertisement),
            'org_name' => $request->org_name,
            'org_inn' => $request->org_inn,
            'erid' => $request->erid,
        ]);

        return response()->json(route('admin.banners.show', $collection->id), 201);
    }

    public function banner_single($id)
    {
        $collection = Banner::find($id);

        if (is_null($collection)) {
            return redirect()->route('pages.admin.banner.new');
        }

        return view('pages.admin.baner.edit', compact('collection', 'id'));
    }

    public function banner_delete(Request $request)
    {
        Banner::where('id', $request->id)->delete();

        return true;
    }

    public function banner_edit(Request $request)
    {
        $collection = Banner::find($request->id)->update([
            'name' => $request->name,
            'img' => $request->img1,
            'advertisement' => $request->advertisement,
            'org_name' => $request->org_name,
            'org_inn' => $request->org_inn,
            'erid' => $request->erid,
        ]);

        return response()->json($collection, 201);
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

    public function tema()
    {
        $collection = Subject::get();

        return view('pages.admin.tema.tema', [
            'collections' => $collection
        ]);
    }

    public function tema_new()
    {
        return view('pages.admin.tema.new');
    }

    public function tema_store(Request $request)
    {
        $collection = Subject::create([
            'name' => $request->name,
        ]);

        return response()->json(route('admin.project-subjects.single', ['id' => $collection->id]), 201);
    }

    public function tema_single($id)
    {
        $collection = Subject::find($id);

        if (is_null($collection)) {
            return redirect(route('pages.admin.tema.new'));
        }

        return view('pages.admin.tema.edit', [
            'collection' => $collection,
            'id' => $id,
        ]);
    }

    public function tema_delete(Request $request)
    {
        Subject::where('id', $request->id)->delete();

        return true;
    }

    public function tema_edit(Request $request)
    {
        $collection = Subject::where('id', $request->id)->update([
            'name' => $request->name,
        ]);

        return response()->json($collection, 201);
    }

    public function tip()
    {
        $collection = Event::get();

        return view('pages.admin.tip.tip', [
            'collections' => $collection
        ]);
    }

    public function tip_new()
    {
        return view('pages.admin.tip.new');
    }

    public function tip_store(Request $request)
    {
        $collection = Event::create([
            'name' => $request->name,
        ]);

        return response()->json(route('admin.event-types.single', ['id' => $collection->id]), 201);
    }

    public function tip_single($id)
    {
        $collection = Event::find($id);

        if (is_null($collection)) {
            return redirect(route('pages.admin.tip.new'));
        }

        return view('pages.admin.tip.edit', [
            'collection' => $collection,
            'id' => $id,
        ]);
    }


    public function tip_delete(Request $request)
    {
        Event::where('id', $request->id)->delete();

        return true;
    }

    public function tip_edit(Request $request)
    {
        $collection = Event::where('id', $request->id)->update([
            'name' => $request->name,
        ]);

        return response()->json($collection, 201);
    }

    public function teg()
    {
        $collection = Tags::get();

        return view('pages.admin.teg.teg', [
            'collections' => $collection
        ]);
    }

    public function teg_new()
    {
        return view('pages.admin.teg.new');
    }

    public function teg_store(Request $request)
    {
        $collection = Tags::create([
            'name' => $request->name,
        ]);

        return response()->json(route('admin.project-tags.single', ['id' => $collection->id]), 201);
    }

    public function teg_single($id)
    {
        $collection = Tags::find($id);

        if (is_null($collection)) {
            return redirect(route('pages.admin.teg.new'));
        }

        return view('pages.admin.teg.edit', [
            'collection' => $collection,
            'id' => $id,
        ]);
    }

    public function teg_delete(Request $request)
    {
        Tags::where('id', $request->id)->delete();

        return true;
    }

    public function teg_edit(Request $request)
    {
        $collection = Tags::where('id', $request->id)->update([
            'name' => $request->name,
        ]);

        return response()->json($collection, 201);
    }

    public function partners()
    {
        $collection = Role::get();

        return view('pages.admin.partners.partners', [
            'collections' => $collection
        ]);
    }

    public function partners_new()
    {
        return view('pages.admin.partners.new');
    }

    public function partners_store(Request $request)
    {
        $collection = Role::create([
            'name' => $request->name,
        ]);

        return response()->json(route('admin.project-roles.single', ['id' => $collection->id]), 201);
    }

    public function partners_single($id)
    {
        $collection = Role::find($id);

        if (is_null($collection)) {
            return redirect(route('pages.admin.partners.new'));
        }

        return view('pages.admin.partners.edit', [
            'collection' => $collection,
            'id' => $id,
        ]);
    }

    public function partners_delete(Request $request)
    {
        Role::where('id', $request->id)->delete();

        return true;
    }

    public function partners_edit(Request $request)
    {
        $collection = Role::where('id', $request->id)->update([
            'name' => $request->name,
        ]);

        return response()->json($collection, 201);
    }
}

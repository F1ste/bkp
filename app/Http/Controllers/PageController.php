<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Models\Collection;
use App\Models\User;
use App\Models\News;
use App\Models\Region;
use App\Models\Roles;
use App\Models\Subject;
use App\Models\Tags;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Filters\PageNewsFilter;
use App\Http\Filters\PageProjectsFilter;

class PageController extends Controller
{
    /**
     * View Page Home
     */
    public function home()
    {
         $news = News::orderByDesc('id')->get();
         $collection = Collection::where('price', '1')->orderByDesc('id')->get();
        return view('pages.front.home.home', [
                 'collections'    => $collection,
                'news'        => $news
            ]);
    }

    /**
     * View Page Events
     */
    public function events()
    {
        return view('pages.front.events.events');
    }

    /**
     * View Image
     */
    public function image($filename)
    {
        $filename = str_replace('JPG', 'jpg', $filename);

        $path = storage_path('app/img/' . $filename);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    /**
     * View Page Service
     */
    public function service()
    {
        return view('pages.front.document.service');
    }

    /**
     * View Page Service
     */
    public function personal()
    {
        return view('pages.front.document.personal');
    }

    /**
     * View Page Designer
     */
    public function designer($id)
    {
        $designer = User::where('id', $id)->get();
        $collection = Collection::where('user_id', $id)->get();

        if(count($designer) > 0) {
            $designer = $designer[0];

            return view('pages.front.designer.designer', [
                'designer'      => $designer,
                'collection'    => $collection
            ]);
        } else {
            return redirect(route('home'));
        }
    }



       public function projects(FilterRequest $request)
    {
        $data = $request->validated();
        
        $filter = app()-> make(PageProjectsFilter::class, ['queryParams' => array_filter($data)]);

        $collection = Collection::where('price', 1)->orderByDesc('id')->filter($filter)->paginate(12);
 
        $years = Collection::where('price', 1)->distinct()->orderBy('date_service_from', 'desc')->pluck('date_service_from')->map(function ($date) {
            return Carbon::parse($date)->format('Y');
        })->unique();

        $months = Collection::distinct()->orderBy('date_service_from', 'asc')->pluck('date_service_from')->map(function ($date) {
            return Carbon::parse($date)->isoFormat('MMMM');
        })->unique();

        $eventType = Collection::where('price', 1)->distinct()->orderBy('tip', 'asc')->pluck('tip')->map(function ($eventType) {
            return $eventType;
        })->unique();
        
        $tema = Collection::where('price', 1)->distinct()->orderBy('tema', 'asc')->pluck('tema')->map(function ($tema) {
            return $tema;
        })->unique();

        $teg = Tags::distinct()->orderBy('name', 'asc')->pluck('name')->map(function ($teg) {
            return $teg;
        })->unique();

        $roles = Roles::distinct()->orderBy('name', 'asc')->pluck('name')->map(function ($roles) {
            return $roles;
        })->unique();

        return view('pages.front.projects.projects', [
            'collections'    => $collection,
            'years' => $years,
            'months' => $months,
            'event_type' => $eventType,
            'tema' => $tema,
            'teg' => $teg,
            'roles' => $roles
        ]);

    }

           public function project($id)
    {
         $collection = Collection::where('id', $id)->get();
        $id_user = $collection[0]->user_id;
        $user = User::where('id', $id_user)->get();

         $collection = $collection[0];
            $user = $user[0];
            $images = json_decode($collection->images)->images;
            $teg = json_decode($collection->teg);
            $serch = json_decode($collection->serch);

            return view('pages.front.projects.project', [
                 'collection'    => $collection,
                'images'        => $images,
                'id'            => $id,
                'teg'            => $teg,
                'serch'            => $serch,
                'user'            => $user
            ]);

    }




    public function news(FilterRequest $request)
    {
        $data = $request->validated();
        
        $filter = app()-> make(PageNewsFilter::class, ['queryParams' => array_filter($data)]);

        $collection = News::orderByDesc('id')->filter($filter)->paginate(10);
 
        $years = News::distinct()->orderBy('date', 'desc')->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('Y');
        })->unique();

        $months = News::distinct()->orderBy('date', 'asc')->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->isoFormat('MMMM');
        })->unique();

        $categories = News::distinct()->orderBy('rubrica', 'asc')->pluck('rubrica')->map(function ($category) {
            return $category;
        })->unique();

        $projects = News::distinct()->orderBy('project', 'asc')->pluck('project')->map(function ($project) {
            return $project;
        })->unique();

        return view('pages.front.news.news', [
            'collections'    => $collection,
            'years' => $years,
            'months' => $months,
            'categories' => $categories,
            'projects' => $projects
        ]);
    }


     public function tidings($id)
    {
         $collection = News::where('id', $id)->get();
          $collection = $collection[0];

        return view('pages.front.news.tidings', [
                'collection'    => $collection,
                'id'            => $id,
            ]);
    }


}

























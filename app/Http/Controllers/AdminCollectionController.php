<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

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
}

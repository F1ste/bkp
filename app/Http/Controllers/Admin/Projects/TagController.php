<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $collections = Tags::all();
        return view('pages.admin.teg.teg', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.admin.teg.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection = Tags::create([
            'name' => $request->name,
        ]);

        return response()->json(route('admin.projects.tags.edit', $collection->id), 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\View\View
     */
    public function edit(Tags $tag)
    {
        return view('pages.admin.teg.edit', [
            'collection' => $tag,
            'id' => $tag->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tags $tag)
    {
        $collection = $tag->update([
            'name' => $request->name,
        ]);

        return response()->json($collection, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tags  $tags
     */
    public function destroy(Tags $tag)
    {
        return $tag->delete();
    }
}

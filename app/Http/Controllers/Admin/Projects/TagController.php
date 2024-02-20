<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Models\Tag;
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
        $collections = Tag::all();
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
        $tag = Tag::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.projects.tags.edit', $tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tags
     * @return \Illuminate\View\View
     */
    public function edit(Tag $tag)
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
     * @param  \App\Models\Tag  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.projects.tags.edit', $tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tags
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.projects.tags.index');
    }
}

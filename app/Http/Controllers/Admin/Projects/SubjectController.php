<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $collections = Subject::all();
        return view('pages.admin.tema.tema', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('pages.admin.tema.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection = Subject::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.projects.subjects.edit', $collection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Subject $subject)
    {
        return view('pages.admin.tema.edit', [
            'collection' => $subject,
            'id' => $subject->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $subject->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.projects.subjects.edit', $subject);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('admin.projects.subjects.index');
    }
}

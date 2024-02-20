<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $collections = Event::all();
        return view('pages.admin.tip.tip', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.admin.tip.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection = Event::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.projects.events.edit', $collection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\View\View
     */
    public function edit(Event $event)
    {
        return view('pages.admin.tip.edit', [
            'collection' => $event,
            'id' => $event->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.projects.events.edit', $event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.projects.events.index');
    }
}

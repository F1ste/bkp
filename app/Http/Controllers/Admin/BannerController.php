<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $collections = Banner::all();
        return view('pages.admin.baner.baner', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.admin.baner.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = Banner::create([
            'name' => $request->name,
            'img' => $request->img1,
            'advertisement' => boolval($request->advertisement),
            'org_name' => $request->org_name,
            'org_inn' => $request->org_inn,
            'erid' => $request->erid,
        ]);

        return response()->json(route('admin.banners.edit', $banner), 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\View\View
     */
    public function edit(Banner $banner)
    {
        return view('pages.admin.baner.edit', [
            'collection' => $banner,
            'id' => $banner->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $collection = $banner->update([
            'name' => $request->name,
            'img' => $request->img1,
            'advertisement' => $request->advertisement,
            'org_name' => $request->org_name,
            'org_inn' => $request->org_inn,
            'erid' => $request->erid,
        ]);

        return response()->json($collection, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     */
    public function destroy(Banner $banner)
    {
        return $banner->delete();
    }
}

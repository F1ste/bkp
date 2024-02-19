<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $collections = Category::get();
        return view('pages.admin.rubric.rubric', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.admin.rubric.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection = Category::create([
            'name' => $request->name,
        ]);

        return response()->json(route('admin.news.categories.edit', $collection), 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News\Category  $category
     * @return \Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('pages.admin.rubric.edit', [
            'collection' => $category,
            'id' => $category->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $collection = $category->update([
            'name' => $request->name,
        ]);

        return response()->json($collection, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News\Category  $category
     */
    public function destroy(Category $category)
    {
        return $category->delete();
    }
}

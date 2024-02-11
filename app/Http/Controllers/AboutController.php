<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use App\Models\Traits\ImageTrait;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $about = About::get();
        return view('pages.about')->with('about', $about);
    }

    public function edit($id)
    {
        $about = About::find($id);

        if (is_null($about)) {
            return redirect(route('admin.about.edit'));
        }

        return view('pages.admin.about.edit', [
            'about' => $about,
            'id' => $id,

        ]);
    }

    public function img(Request $request)
    {
        return $this->imgStore($request);
    }

    public function update(AboutRequest $request)
    {
        $request->validated();

        $collection = About::where('id', $request->id)->update([
            'title' => $request->title,
            'img' => $request->img,
            'description' => $request->description,

        ]);

        return response()->json($collection, 201);
    }

    public function about()
    {
        $about = About::all();
        return view('pages.admin.about.index')->with('about', $about);
    }
}

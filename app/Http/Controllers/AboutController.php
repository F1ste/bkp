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
    
    public function edit(About $about)
    {
        return view('pages.admin.about.edit',[
            'about'=>$about
        ]);
    }

    public function update(About $about,AboutRequest $request)
    {
        $request->validated();

        $about->udpate([
        'title' => $request->title,
        'description'=> $request->description,
        'img'=> $this->imgStore($request),
        ]);
        return redirect()->route('pages.admin.about.index');
    }

    public function about(){
        $about=About::all();
        return view('pages.admin.about.index')->with('about', $about);
    }
}

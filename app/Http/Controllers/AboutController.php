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
        $about =  About::where('id', $id)->find();

        if(count($about) > 0) {

            $about = $about[0];
            

            return view('pages.admin.about.edit', [ 
                'about'    => $about,
                'id'       => $id,
                
            ]);
        } else {
            return redirect(route('admin.about.edit'));
        }
    }
    public function img(Request $request){
        return $this->imgStore($request);
    }
    public function update(AboutRequest $request)
    {
        $request->validated();
        
        $collection = About::where('id', $request->id)->update([
            'title'         => $request->title,
            'img'           => $request->img,
            'description'   => $request->description,
            
        ]);
        
        return response()->json($collection, 201);
    }

    public function about(){
        $about=About::all();
        return view('pages.admin.about.index')->with('about', $about);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\FAQRequest;
use App\Models\FAQ;
use App\Models\Traits\ImageTrait;
use Illuminate\Http\Request;

class FAQController extends Controller
{   
    use ImageTrait;
    public function index()
    {
        $faq = FAQ::all();
        return view('pages.faq')->with('faq', $faq);
    }
    
    public function edit(FAQ $faq)
    {
        return view('pages.admin.faq.edit',[
            'faq'=>$faq
        ]);
    }

    public function update(FAQ $faq,FAQRequest $request)
    {
        $request->validated();

        $faq->udpate([
        'title' => $request->title,
        'description'=> $request->description,
        'img'=> $this->imgStore($request),
        ]);
        return redirect()->route('pages.admin.faq.index');
    }
    public function create()
    {
        return view('pages.admin.faq.create',[
        ]);
    }

    public function store(FAQRequest $request)
    {
        $request->validated();
        $faq=new FAQ;
        $faq->quest=$request->quest;
        $faq->description=$request->description;
        return redirect()->route('pages.admin.faq.index');
    }

    public function faq (){
        $faq=FAQ::all();
        return view('pages.admin.faq.index')->with('faq', $faq);
    }
}

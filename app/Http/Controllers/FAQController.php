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

    public function edit($id)
    {
        $faq = FAQ::find($id);

        if (is_null($faq)) {
            return redirect(route('pages.admin.faq.create'));
        }

        return view('pages.admin.faq.edit', [
            'faq' => $faq,
            'id' => $id,
        ]);
    }

    public function img(Request $request)
    {
        return $this->imgStore($request);
    }

    public function update(FAQRequest $request)
    {
        $request->validated();

        $faq = FAQ::where('id', $request->id)->update([
            'quest' => $request->quest,
            'img' => $request->img,
            'description' => $request->description,
        ]);

        return response()->json($faq, 201);
    }

    public function create()
    {
        return view('pages.admin.faq.create');
    }

    public function store(FAQRequest $request)
    {
        $request->validated();
        $faq = new FAQ();
        $faq->quest = $request->quest;
        $faq->description = $request->description;
        $faq->img = $request->img;
        $faq->save();
        return response()->json(route('admin.faq.edit', ['id' => $faq->id]), 201);
    }

    public function faq()
    {
        $faq = FAQ::all();
        return view('pages.admin.faq.index')->with('faq', $faq);
    }

    public function delete(Request $request)
    {
        FAQ::where('id', $request->id)->delete();
        return true;
    }
}

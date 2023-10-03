<?php

namespace App\Http\Controllers;

use App\Http\Requests\FdescrRequest;
use App\Http\Requests\FiconRequest;
use App\Http\Requests\FinfoRequest;
use App\Models\Fdescr;
use App\Models\Ficon;
use App\Models\Finfo;
use App\Models\Fpage;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index(){

        $footer_ar=[
            'icons'=>Ficon::all(),
            'pages'=>Fpage::all(),
            'info'=>Finfo::all(),
            'descr'=>Fdescr::all(),
        ];
        return view('components.footer-index')->with('footer_ar',$footer_ar);
    }

    public function fdescr_create()
    {
        
        return view('pages.admin.footer.fdescr.create',[
        ]);
    }
    public function ficon_create()
    {
        
        return view('pages.admin.footer.ficon.create',[
        ]);
    }
    public function finfo_create()
    {
        
        return view('pages.admin.footer.finfo.create',[
        ]);
    }
    public function fpage_create()
    {
        return view('pages.admin.footer.fpage.create',[
        ]);
    }
    public function fdescr_store(FdescrRequest $request)
    {
        $request->validated();
        $fdescr=new Fdescr;
        $fdescr->descr=$request->descr;
        $fdescr->save();
        return response()->json(route('admin.faq.edit', ['id' => $fdescr->id]), 201);
    }
    public function ficon_store(FiconRequest $request)
    {
        $request->validated();
        $ficon=new Ficon;
        $ficon->icon=$request->icon;
        $ficon->save();
        return response()->json(route('admin.faq.edit', ['id' => $ficon->id]), 201);
    }
    public function finfo_store(FinfoRequest $request)
    {
        $request->validated();
        $finfo=new Finfo;
        $finfo->info=$request->info;
        $finfo->save();
        return response()->json(route('admin.faq.edit', ['id' => $finfo->id]), 201);
    }


}

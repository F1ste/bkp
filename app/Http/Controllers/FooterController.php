<?php

namespace App\Http\Controllers;

use App\Http\Requests\FdescrRequest;
use App\Http\Requests\FiconRequest;
use App\Http\Requests\FpageRequest;
use App\Models\Fdescr;
use App\Models\Ficon;
use App\Models\Fpage;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {

        $footer_ar = [
            'icons' => Ficon::all(),
            'pages' => Fpage::all(),
            'descr' => Fdescr::all(),
        ];
        return view('components.footer-index')->with('footer_ar', $footer_ar);
    }

    public function fdescr_create()
    {

        return view('pages.admin.footer.fdescr.create', []);
    }
    public function ficon_create()
    {

        return view('pages.admin.footer.ficon.create', []);
    }

    public function fpage_create()
    {
        return view('pages.admin.footer.fpage.create', []);
    }
    public function fdescr_store(FdescrRequest $request)
    {
        $request->validated();
        $fdescr = new Fdescr;
        $fdescr->descr = $request->descr;
        $fdescr->save();
        return response()->json(route('pages.admin.footer.fdescr.edit', ['id' => $fdescr->id]), 201);
    }
    public function ficon_store(FiconRequest $request)
    {
        $request->validated();
        $ficon = new Ficon;
        $ficon->icon = $request->icon;
        $ficon->save();
        return response()->json(route('pages.admin.footer.ficon.edit', ['id' => $ficon->id]), 201);
    }

    public function fpage_store(FpageRequest $request)
    {
        $request->validated();
        $fpage = new Fpage;
        $fpage->page = $request->page;
        $fpage->link = $request->link;
        $fpage->save();
        return response()->json(route('pages.admin.footer.fpage.edit', ['id' => $fpage->id]), 201);
    }
    public function fdescr_update(FdescrRequest $request)
    {
        $request->validated();
        $fdescr = Fdescr::where('id', $request->id)->update([
            'descr' => $request->descr
        ]);
        return response()->json($fdescr, 201);
    }
    public function ficon_update(FiconRequest $request)
    {
        $request->validated();
        $ficon = Ficon::where('id', $request->id)->update([
            'icon' => $request->icon
        ]);
        return response()->json($ficon, 201);
    }
    public function fpage_update(FpageRequest $request)
    {
        $request->validated();
        $fpage = Ficon::where('id', $request->id)->update([
            'page' => $request->page,
            'link' => $request->link
        ]);
        return response()->json($fpage, 201);
    }
    public function fdescr_edit($id)
    {
        $fdescr =  Fdescr::where('id', $id)->get();
        if (count($fdescr) > 0) {
            $fdescr = $fdescr[0];
            return view('pages.admin.footer.fdescr.edit', [
                'fdescr'      => $fdescr,
                'id'       => $id,
            ]);
        } else {
            return redirect(route('pages.admin.footer.fdescr.create'));
        }
    }
    public function ficon_edit($id)
    {
        $ficon =  Ficon::where('id', $id)->get();
        if (count($ficon) > 0) {
            $ficon = $ficon[0];
            return view('pages.admin.footer.ficon.edit', [
                'ficon'      => $ficon,
                'id'       => $id,
            ]);
        } else {
            return redirect(route('pages.admin.footer.ficon.create'));
        }
    }
    public function fpage_edit($id)
    {
        $fpage =  Fpage::where('id', $id)->get();
        if (count($fpage) > 0) {
            $fpage = $fpage[0];
            return view('pages.admin.footer.fpage.edit', [
                'ficon'      => $fpage,
                'id'       => $id,
            ]);
        } else {
            return redirect(route('pages.admin.footer.fpage.create'));
        }
    }
    public function footer(){
        $footer_ar = [
            'icons' => Ficon::all(),
            'pages' => Fpage::all(),
            'descr' => Fdescr::all(),
        ];
        return view('pages.admin.footer.index')->with('footer_ar', $footer_ar);
    }
    public function fdescr_delete(Request $request){
        Fdescr::where('id', $request->id)->delete();
        return true;
     }
     public function ficon_delete(Request $request){
        Ficon::where('id', $request->id)->delete();
        return true;
     }
     public function fpage_delete(Request $request){
        Fpage::where('id', $request->id)->delete();
        return true;
     }
    
}

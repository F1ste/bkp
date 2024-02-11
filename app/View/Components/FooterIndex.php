<?php

namespace App\View\Components;

use App\Models\Fdescr;
use App\Models\Ficon;
use App\Models\Fpage;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class FooterIndex extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */public $footer_ar;
    public function __construct(Ficon $ficon, Fpage $fpage, Fdescr $fdescr)
    {
        $footer_ar = [
            'icons' => $ficon::all(),
            'pages' => $fpage::all(),
            'descr' => $fdescr::all(),
        ];
        $this->footer_ar = $footer_ar;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer-index');
    }
}

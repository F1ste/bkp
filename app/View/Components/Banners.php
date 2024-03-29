<?php

namespace App\View\Components;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Banners extends Component
{
    public Collection $banners;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->banners = Banner::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.banners');
    }
}

<?php


namespace App\Models\Traits;


use Illuminate\Http\Request;

trait ImageTrait
{
    function imgStore(Request $request): string
    {
        $path='';
            if ($request->has('file')) {   
                $value=$request->file('file');
                $ext = $value->extension();
                $image_name = uniqid() . '.' . $ext;
                $value->move(public_path() . '/covers/', $image_name);
                $cover = '/storage/' . $image_name;
    }
    return $path;
}
}
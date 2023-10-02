<?php


namespace App\Models\Traits;


use Illuminate\Http\Request;

trait ImageTrait
{
    function imgStore(Request $request): string
    {
        $size = $request->file('file')->getSize();
        $type = $request->file('file')->extension();

        $name = $size.'_'.'image'.'.'.$type;

        $path = $request->file('file')->storeAs(
            'public', $name
        );

        $link = '/storage/'.$name;

        return $link;
}
}
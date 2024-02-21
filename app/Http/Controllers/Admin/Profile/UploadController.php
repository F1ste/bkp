<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UploadImageRequest;
use App\Models\File;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function image(UploadImageRequest $request)
    {
        return File::upload($request->file('file'));
    }
}

<?php

namespace App\Models;

use App\Http\Requests\AboutRequest;
use App\Models\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'description',
        'img',
        'title'
    ];



}

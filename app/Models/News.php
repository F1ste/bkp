<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'news';

    protected $fillable = [
        'id',
        'name',
        'pod_text',
        'text',
        'date',
        'img',
        'project',
        'rubrica',
        'banner',
        'glav',
        'pozits',
        'img2',
        'img3',
        'img4',
        'img5',
        'img6' ,
        'video',
        'img7' ,
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->name);
        });
    }
}

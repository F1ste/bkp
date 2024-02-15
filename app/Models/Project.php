<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'projects';

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'images',
        'excerpt',
        'date_service_from',
        'date_service_to',
        'price',
        'created_at',
        'region',
        'tip',
        'teg',
        'tema',
        'tel',
        'email',
        'name_proj',
        'video',
        'serch',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'img6',
    ];

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'service_id', 'id');
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class, 'service_id', 'id');
    }
}

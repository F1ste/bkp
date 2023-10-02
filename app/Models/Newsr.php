<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsr extends Model
{
    use HasFactory;

    protected $table = 'news_rub';

    protected $fillable = [
        'id',
        'name',
    ];
}

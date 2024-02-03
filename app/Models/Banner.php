<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $table = 'banner';

    protected $fillable = [
        'name',
        'img',
        'advertisement',
        'org_name',
        'org_inn',
        'erid',
    ];
}

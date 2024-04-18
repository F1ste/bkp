<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

/**
 * @method \Illuminate\Database\Eloquent\Builder orderByGlav()
 * @method \Illuminate\Database\Eloquent\Builder orderByPozits()
 */
class News extends Model
{
    use HasFactory;
    use Filterable;
    use Searchable;

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

        static::saving(function ($news) {
            if (! $news->glav && ! $news->pozits) {
                return;
            }

            if ($news->isDirty('glav') && $news->glav) {
                self::where('glav', $news->glav)->update(['glav' => 0]);
            }

            if ($news->isDirty('pozits') && $news->pozits) {
                self::where('pozits', $news->pozits)->update(['pozits' => 0]);
            }
        });
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'pod_text' => strip_tags($this->pod_text),
            'text' => strip_tags($this->text),
            'date' => Carbon::parse($this->date),
            'created_at' => $this->created_at,
        ];
    }

    public function scopeOrderByGlav()
    {
        return $this->orderByRaw('IF(glav > 0, 4 - glav, 0) DESC');
    }

    public function scopeOrderByPozits()
    {
        return $this->orderByRaw('IF(pozits > 0, 4 - pozits, 0) DESC');
    }
}

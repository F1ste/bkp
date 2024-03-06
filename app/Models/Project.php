<?php

namespace App\Models;

use App\Events\Projects\ProjectArchived;
use App\Events\Projects\ProjectDeclined;
use App\Events\Projects\ProjectPublished;
use App\Events\Projects\ProjectStatusChange;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    use Filterable;

    public const STATUS_MODERATION = 0;
    public const STATUS_PUBLISHED = 1;
    public const STATUS_ARCHIVED = 2;
    public const STATUS_DECLINED = 3;

    protected $table = 'projects';

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'images',
        'excerpt',
        'date_service_from',
        'date_service_to',
        'status',
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
        'reason',
    ];

    protected $casts = [
        'date_service_from' => 'date',
        'date_service_to' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->name);
        });
    }

    protected static function booted()
    {
        static::updated(function ($project) {
            $is_status_changed = $project->status != $project->getOriginal('status');
            $is_reason_changed = $project->status == self::STATUS_DECLINED && $project->reason != $project->getOriginal('reason');

            if ($is_status_changed || $is_reason_changed) {
                ProjectStatusChange::dispatch($project);

                if ($project->status == self::STATUS_PUBLISHED) {
                    ProjectPublished::dispatch($project);
                } elseif ($project->status == self::STATUS_DECLINED) {
                    ProjectDeclined::dispatch($project);
                } elseif ($project->status == self::STATUS_ARCHIVED) {
                    ProjectArchived::dispatch($project);
                }
            }
        });
    }

    public function isOnModeration(): bool
    {
        return $this->status == self::STATUS_MODERATION;
    }

    public function isPublished(): bool
    {
        return $this->status == self::STATUS_PUBLISHED;
    }

    public function isDeclined(): bool
    {
        return $this->status == self::STATUS_DECLINED;
    }

    public function isArchived(): bool
    {
        return $this->status == self::STATUS_ARCHIVED;
    }

    public function scopeOnModeration($query)
    {
        return $query->where('status', self::STATUS_MODERATION);
    }

    public function scopePublished($query)
    {
        return $query->where('status', self::STATUS_PUBLISHED);
    }

    public function scopeArchived($query)
    {
        return $query->where('status', self::STATUS_ARCHIVED);
    }

    public function scopeDeclined($query)
    {
        return $query->where('status', self::STATUS_DECLINED);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'service_id', 'id');
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class, 'service_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

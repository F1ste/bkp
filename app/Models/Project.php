<?php

namespace App\Models;

use App\Events\Projects\ProjectArchived;
use App\Events\Projects\ProjectDeclined;
use App\Events\Projects\ProjectPublished;
use App\Events\Projects\ProjectStatusChange;
use App\Models\Scopes\ExcludeDraftsScope;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    use Filterable;

    public const STATUS_DRAFT = -1;
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
        'order',
    ];

    protected $attributes = [
        'order' => 100,
    ];

    protected $casts = [
        'date_service_from' => 'date',
        'date_service_to' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (!$project->isDraft()) {
                $slug = Str::slug($project->name_proj);
                $count = Project::where('slug', 'like', $slug . '%')->count();
                if ($count > 0) {
                    $slug .= '-' . ($count);
                }
                $project->slug = $slug;
            }
        });
    }

    protected static function booted()
    {
        static::addGlobalScope(new ExcludeDraftsScope());

        static::updated(function ($project) {
            $is_status_changed = $project->status != $project->getOriginal('status');
            $is_reason_changed = $project->status == self::STATUS_DECLINED && $project->reason != $project->getOriginal('reason');

            if ($is_status_changed || $is_reason_changed) {
                ProjectStatusChange::dispatch($project);

                if (is_null($project->slug)) {
                    $project->refresh();
                    $slug = Str::slug($project->name_proj);
                    $count = Project::where('slug', 'like', $slug . '%')->count();
                    if ($count > 0) {
                        $slug .= '-' . ($count);
                    }
                    $project->slug = $slug;
                    $project->save();
                }

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

    public function isDraft(): bool
    {
        return $this->status == self::STATUS_DRAFT;
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

    public function scopeWithDrafts(Builder $query)
    {
        return $query->withoutGlobalScope(ExcludeDraftsScope::class);
    }

    public function scopeOnlyDrafts(Builder $query)
    {
        return $query
            ->withoutGlobalScope(ExcludeDraftsScope::class)
            ->where('status', self::STATUS_DRAFT);
    }

    public function scopeWithoutDrafts(Builder $query)
    {
        return $query
            ->withoutGlobalScope(ExcludeDraftsScope::class)
            ->where('status', '!=', self::STATUS_DRAFT);
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

<?php

namespace App\Models\Scopes;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class ExcludeDraftsScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $userId = Auth::id();
        $builder->where(function($query) use ($userId) {
            $query->where('status', '!=', Project::STATUS_DRAFT)
                  ->orWhere('user_id', $userId);
        });
    }
}

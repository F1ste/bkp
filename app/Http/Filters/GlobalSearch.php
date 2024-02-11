<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class GlobalSearch extends AbstractFilter
{
    public const SEARCHTEXT = 'searchText';

    protected function getCallbacks(): array
    {
        return [
            self::SEARCHTEXT => [$this, 'searchText'],

        ];
    }

    public function searchText(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }
}

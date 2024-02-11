<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class NewsFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const TEXT = 'text';
    public const DATE = 'date';

    public const RUBRICA = 'rubrica';

    public const GLAV = 'glav';
    public const PROJECT = 'project';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::TEXT => [$this, 'text'],
            self::DATE => [$this, 'date'],
            self::RUBRICA => [$this, 'rubrica'],
            self::GLAV => [$this, 'glav'],
            self::PROJECT => [$this, 'project'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function text(Builder $builder, $value)
    {
        $builder->where('text', 'like', "%{$value}%");
    }

    public function date(Builder $builder, $value)
    {
        $startDate = null;
        $endDate = null;

        // Проверяем, если в запросе присутствует символ "-"
        if (strpos($value, '-') !== false) {
            list($startDate, $endDate) = explode('-', $value);
        } else {
            // Если символ "-" отсутствует, то дата - это начальная дата
            $endDate = $value;
        }

        // Преобразуем даты в формат YYYY-MM-DD
        if ($startDate) {
            $startDate = \Illuminate\Support\Carbon::parse($startDate)->format('Y-m-d');
            //dd($startDate);
        }
        if ($endDate) {
            $endDate = \Illuminate\Support\Carbon::parse($endDate)->format('Y-m-d');
            //dd($endDate);
        }

        // Ищем записи в зависимости от заданных дат
        if ($startDate && $endDate) {
            // Если указаны обе даты, ищем в диапазоне
            $builder->whereBetween('date', [$startDate, $endDate]);
        } elseif ($startDate) {
            // Если указана только начальная дата, ищем с нее и до конца
            $builder->where('date', '>=', $startDate);
        } elseif ($endDate) {
            // Если указана только конечная дата, ищем до нее
            $builder->where('date', '<=', $endDate);
        }
    }
    public function rubrica(Builder $builder, $value)
    {
        $builder->where('rubrica', $value);
    }
    public function glav(Builder $builder, $value)
    {
        $builder->where('glav', $value);
    }

    public function project(Builder $builder, $value)
    {
        $builder->where('project', 'like', "%{$value}%");
    }
}

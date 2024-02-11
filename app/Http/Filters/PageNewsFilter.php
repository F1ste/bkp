<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PageNewsFilter extends AbstractFilter
{
    public const MONTH = 'month';
    public const YEAR = 'year';

    public const RUBRICA = 'rubrica';
    public const PROJECT = 'project';

    protected function getCallbacks(): array
    {
        return [
            self::MONTH => [$this, 'month'],
            self::YEAR => [$this, 'year'],
            self::RUBRICA => [$this, 'rubrica'],
            self::PROJECT => [$this, 'project'],
        ];
    }

    public function month(Builder $builder, $value)
    {
        $months = $value;
        $monthMappings = [
            'январь' => '01',
            'февраль' => '02',
            'март' => '03',
            'апрель' => '04',
            'май' => '05',
            'июнь' => '06',
            'июль' => '07',
            'август' => '08',
            'сентябрь' => '09',
            'октябрь' => '10',
            'ноябрь' => '11',
            'декабрь' => '12',
        ];

        $builder->where(function ($query) use ($months, $monthMappings) {
            foreach ($months as $month) {
                $numericMonth = $monthMappings[strtolower($month)];
                $year = date('Y');
                $startOfMonth = "{$year}-{$numericMonth}-01";
                $endOfMonth = "{$year}-{$numericMonth}-" . date('t', strtotime($numericMonth));

                $query->orWhereBetween('date', [$startOfMonth, $endOfMonth]);
            }
        });
    }

    public function year(Builder $builder, $value)
    {
        $years = $value;

        $builder->where(function ($query) use ($years) {
            foreach ($years as $year) {
                $startOfYear = "{$year}-01-01";
                $endOfYear = "{$year}-12-31";

                $query->orWhereBetween('date', [$startOfYear, $endOfYear]);
            }
        });
    }

    public function rubrica(Builder $builder, $value)
    {
        $values = $value;
        $builder->where(function ($query) use ($values) {
            foreach ($values as $value) {
                $query->orWhere('rubrica', $value);
            }
        });
    }

    public function project(Builder $builder, $value)
    {
        $values = $value;
        $builder->where(function ($query) use ($values) {
            foreach ($values as $value) {
                $query->orWhere('project', $value);
            }
        });
    }
}

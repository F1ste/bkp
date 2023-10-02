<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PageProjectsFilter extends AbstractFilter
{



    public const MONTH = 'month';
    public const YEAR = 'year';

    public const TIP = 'tip';
    public const TEMA = 'tema';
    public const TEG = 'teg';

    public const ROLE = 'role';

    protected function getCallbacks(): array
    {
        return [
            self::MONTH => [$this, 'month'],
            self::YEAR => [$this, 'year'],
            self::TIP => [$this, 'tip'],
            self::TEMA => [$this, 'tema'],
            self::TEG => [$this, 'teg'],
            self::ROLE => [$this, 'role'],
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
                
                $query->orWhereBetween('date_service_from', [$startOfMonth, $endOfMonth]);
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
                
                $query->orWhereBetween('date_service_from', [$startOfYear, $endOfYear]);
                
            }
        });
        
    }

    public function tip(Builder $builder, $value)
    {
        $values = $value;
        $builder->where(function ($query) use ($values) {
            foreach ($values as $value) {
                $query->orWhere('tip', $value);
            }
        });
    }

    public function tema(Builder $builder, $value)
    {
        $values = $value;
        $builder->where(function ($query) use ($values) {
            foreach ($values as $value) {
                $query->orWhere('tema', $value);
            }
        });
    }

    public function teg(Builder $builder, $value)
    {
        $values = $value;
        $builder->where(function ($query) use ($values) {
            foreach ($values as $value) {
                $query->orWhere('teg', 'like', "%{$value}%");
            }
        });
    }

    public function role(Builder $builder, $value)
    {
        $values = $value;
        $builder->where(function ($query) use ($values) {
            foreach ($values as $value) {
                $query->orWhere('serch', 'like', "%{$value}%");
            }
        });
    }
}

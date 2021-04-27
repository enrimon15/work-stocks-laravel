<?php


namespace App\Models\Filters;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterJobOfferSalary implements Filter
{

    public function __invoke(Builder $query, $value, string $property)
    {
        switch ($value) {
            case 0:
                $query->where('max_salary','<=', 500);
                break;
            case 1:
                $query->where('min_salary','>=',500)
                    ->where('max_salary','<=', 1000);
                break;
            case 2:
                $query->where('min_salary','>=',1000)
                    ->where('max_salary','<=', 2000);
                break;
            case 3:
                $query->where('min_salary','>=',2000)
                    ->where('max_salary','<=', 5000);
                break;
            case 4:
                $query->where('min_salary','>=',5000);
                break;
            default:
        }
    }

}

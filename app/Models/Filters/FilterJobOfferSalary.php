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
                $query->where('min_salary','>=', 0)->where('max_salary','<=', 5);
                break;
            case 1:
                $query->where('min_salary','>=', 5)->where('max_salary','<=', 10);
                break;
            case 2:
                $query->where('min_salary','>=', 10)->where('max_salary','<=', 20);
                break;
            case 3:
                $query->where('min_salary','>=', 20)->where('max_salary','<=', 50);
                break;
            case 4:
                $query->where('min_salary','>=', 50);
                break;
            default:
        }
    }

}

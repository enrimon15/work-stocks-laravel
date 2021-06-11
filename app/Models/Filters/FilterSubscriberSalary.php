<?php


namespace App\Models\Filters;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterSubscriberSalary implements Filter
{

    public function __invoke(Builder $query, $value, string $property)
    {

        $query->whereHas('profile',function(Builder $query) use($value) {
            switch ($value) {
                case 0:
                    $query->where('min_salary','<=', 5);
                    break;
                case 1:
                    $query->where('min_salary','<=', 10);
                    break;
                case 2:
                    $query->where('min_salary','<=', 20);
                    break;
                case 3:
                    $query->where('min_salary','<=', 30);
                    break;
                case 4:
                    $query->where('min_salary','>', 30);
                    break;
                default:
            }
        });



    }

}

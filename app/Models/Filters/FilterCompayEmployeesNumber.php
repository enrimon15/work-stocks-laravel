<?php


namespace App\Models\Filters;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterCompayEmployeesNumber implements Filter
{

    public function __invoke(Builder $query, $value, string $property)
    {
        switch ($value) {
            case 0:
                $query->where('employees_number','<=', 100);
                break;
            case 1:
                $query->whereBetween('employees_number',[100,500]);
                break;
            case 2:
                $query->whereBetween('employees_number',[500,1000]);
                break;
            case 3:
                $query->whereBetween('employees_number',[1000,2000]);
                break;
            case 4:
                $query->where('employees_number','>=', 2000);
                break;
            default:
        }
    }

}

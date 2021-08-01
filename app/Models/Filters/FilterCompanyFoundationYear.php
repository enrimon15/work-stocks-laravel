<?php


namespace App\Models\Filters;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterCompanyFoundationYear implements Filter
{

    public function __invoke(Builder $query, $value, string $property)
    {
        switch ($value) {
            case 0:
                $query->where('foundation_year','<=', 1980);
                break;
            case 1:
                $query->whereBetween('foundation_year',[1980,2000]);
                break;
            case 2:
                $query->whereBetween('foundation_year',[2000,2010]);
                break;
            case 3:
                $query->whereBetween('foundation_year',[2010,2020]);
                break;
            case 4:
                $query->where('foundation_year','>=', 2021);
                break;
            default:
        }
    }

}

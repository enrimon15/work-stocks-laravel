<?php


namespace App\Models\Filters;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterJobOfferExperienceYears implements  Filter
{

    public function __invoke(Builder $query, $value, string $property) {
        $query->where('experience','>=', $value);
    }
}

<?php


namespace App\Models\Filters;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterJobOfferLocation implements Filter
{

    public function __invoke(Builder $query, $value, string $property)
    {

        $query->whereHas('placesOfWork',function(Builder $query) use($value) {
            $query->where('address', 'like', '%'.$value.'%')
                ->orWhere('city', 'like', '%'.$value.'%')
                ->orWhere('country', 'like', '%'.$value.'%');
        });
//        $query->where('placesOfWork.address', 'like','%'.$value.'%')
//            ->orWhere('placesOfWork.country', 'like','%'.$value.'%')
//            ->orWhere('placesOfWork.city', 'like','%'.$value.'%');
    }
}

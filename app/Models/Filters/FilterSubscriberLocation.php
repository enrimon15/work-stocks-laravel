<?php


namespace App\Models\Filters;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterSubscriberLocation implements Filter
{

    public function __invoke(Builder $query, $value, string $property)
    {

        $query->whereHas('profile',function(Builder $query) use($value) {
            $query->where('city', 'like', '%'.$value.'%')
                ->orWhere('country', 'like', '%'.$value.'%');
        });
//        $query->where('placesOfWork.address', 'like','%'.$value.'%')
//            ->orWhere('placesOfWork.country', 'like','%'.$value.'%')
//            ->orWhere('placesOfWork.city', 'like','%'.$value.'%');
    }
}

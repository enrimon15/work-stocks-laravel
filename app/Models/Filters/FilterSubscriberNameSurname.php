<?php


namespace App\Models\Filters;


use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterSubscriberNameSurname implements Filter
{

    public function __invoke(Builder $query, $value, string $property)
    {

        $query->where('name', 'like', '%'.$value.'%')
                ->orWhere('surname', 'like', '%'.$value.'%');
//        $query->where('placesOfWork.address', 'like','%'.$value.'%')
//            ->orWhere('placesOfWork.country', 'like','%'.$value.'%')
//            ->orWhere('placesOfWork.city', 'like','%'.$value.'%');
    }
}

<?php


namespace App\Models\Filters;


use App\Models\JobOffer;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class FilterJobOfferSkills implements Filter
{

    public function __invoke(Builder $query, $value, string $property)
    {
        $query->whereHas('skillTags',function(Builder $query) use($value) {
            $query->where('taggable_type', '=',JobOffer::class)
                    ->where('tag_slug', '=', $value);
        });
    }
}

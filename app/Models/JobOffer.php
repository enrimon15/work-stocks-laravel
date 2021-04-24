<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use Spatie\Tags\HasTags;

/**
 * App\Models\JobOffer
 *
 * @property int $id
 * @property int $companies_id
 * @property string $title
 * @property string $description
 * @property int $experience
 * @property string $due_date
 * @property string $offers_type
 * @property string $sex
 * @property int|null $min_salary
 * @property int|null $max_salary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @property array $tag_names
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tagged[] $tags
 * @property-read \Illuminate\Database\Eloquent\Collection|\Conner\Tagging\Model\Tagged[] $tagged
 * @property-read int|null $tagged_count
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereCompaniesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereMaxSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereMinSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereOffersType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer withAllTags($tagNames)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer withAnyTag($tagNames)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer withoutTags($tagNames)
 * @mixin \Eloquent
 */
class JobOffer extends Model
{
    use HasFactory;
    use Taggable;

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
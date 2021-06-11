<?php

namespace App\Models;

use Conner\Tagging\Model\Tagged;
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
 * @property int $commercial_contact_id
 * @property int $places_of_work_id
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereCommercialContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer wherePlacesOfWorkId($value)
 * @property-read \App\Models\PlacesOfWork $placesOfWork
 * @property-read \Illuminate\Database\Eloquent\Collection|Tagged[] $skillTags
 * @property-read int|null $skill_tags_count
 * @property-read \App\Models\PlacesOfWork $workingPlace
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $applicants
 * @property-read int|null $applicants_count
 * @property int $company_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $favoriteUsers
 * @property-read int|null $favorite_users_count
 * @method static \Illuminate\Database\Eloquent\Builder|JobOffer whereCompanyId($value)
 */
class JobOffer extends Model
{
    use HasFactory;
    use Taggable;

    protected $fillable = [
        'title',
        'description',
        'experience',
        'due_date',
        'offers_type',
        'sex',
        'min_salary',
        'max_salary'
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function placesOfWork() {
        return $this->belongsTo(PlacesOfWork::class);
    }

    public function skillTags() {
        return $this->hasMany(Tagged::class, 'taggable_id');
    }

    public function workingPlace() {
        return $this->belongsTo( PlacesOfWork::class, 'places_of_work_id');
    }

    public function applicants() {
        return $this->belongsToMany(User::class,'applications','id_job_offer','id_subscriber')->withTimestamps()->withPivot('id_subscriber');
    }

    public function favoriteUsers() {
        return $this->belongsToMany(User::class,'favorite_jobs','job_offer_id','user_id')->withTimestamps()->withPivot('user_id');
    }
}

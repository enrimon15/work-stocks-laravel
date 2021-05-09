<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use function Illuminate\Support\Facades\Date;

//use Illuminate\Database\Schema\Builder;

/**
 * Class Company
 *
 * @package App\Models
 * @mixin Builder
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\JobOffer[] $jobOffers
 * @property-read int|null $job_offers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @property int $commercial_contact_id
 * @property string $piva
 * @property string $company_form
 * @property string $name
 * @property string $overview
 * @property int $employees_number
 * @property string $foundation_year
 * @property string $website
 * @property string $slogan
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCommercialContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCompanyForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmployeesNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereFoundationYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePiva($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereSlogan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWebsite($value)
 * @property int $user_id
 * @property int $vat_number
 * @property-read \App\Models\CommercialContact $commercialContact
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PlacesOfWork[] $workingPlaces
 * @property-read int|null $working_places_count
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereVatNumber($value)
 */
class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'vat_number',
        'company_form',
        'overview',
        'employees_number',
        'slogan',
        'website',
        'foundation_year'
    ];

    public function jobOffers() {
        return $this->hasMany(JobOffer::class);
    }

    public function commercialContact() {
        return $this->belongsTo(CommercialContact::class);
    }

    public function mainPlaceOfWork() {
        return $this->workingPlaces()->where('primary', '=', true)->first();
    }

    public function user() {
        return $this->belongsTo( User::class);
    }

    public function workingPlaces() {
        return $this->hasMany( PlacesOfWork::class);
    }
}

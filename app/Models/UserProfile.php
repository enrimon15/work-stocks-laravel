<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserProfile
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $job_title
 * @property string|null $overview
 * @property string|null $telephone
 * @property string|null $website
 * @property int|null $min_salary
 * @property string|null $city
 * @property string|null $country
 * @property string|null $cv_path
 * @property string|null $birth
 * @property string|null $sex
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCvPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereMinSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereWebsite($value)
 * @mixin \Eloquent
 */
class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';
    protected $id = 'id';

    protected $fillable = [
        'telephone',
        'overview',
        'job_title',
        'min_salary',
        'city',
        'country',
        'cv_path',
        'birth',
        'sex'
    ];

    public function user() {
        return $this->belongsTo( User::class);
    }
}

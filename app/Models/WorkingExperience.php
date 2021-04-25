<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WorkingExperience
 *
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|WorkingExperience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkingExperience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkingExperience query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $start_date
 * @property string|null $end_date
 * @property int $in_progress
 * @property string|null $description
 * @property string $job_position
 * @property string $company
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WorkingExperience whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkingExperience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkingExperience whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkingExperience whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkingExperience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkingExperience whereInProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkingExperience whereJobPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkingExperience whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkingExperience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkingExperience whereUserId($value)
 */
class WorkingExperience extends Model
{
    use HasFactory;

    protected $table = 'working_experiences';
    protected $id = 'id';

    protected $fillable = [
        'start_date',
        'end_date',
        'in_progress',
        'description',
        'job_position',
        'company'
    ];

    public function user() {
        return $this->belongsTo( User::class);
    }
}

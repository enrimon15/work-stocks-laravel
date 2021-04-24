<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Qualification
 *
 * @property int $id
 * @property int $user_id
 * @property string $start_date
 * @property string|null $end_date
 * @property int $in_progress
 * @property string|null $institute
 * @property string $name
 * @property string|null $description
 * @property string|null $valuation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereInProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereInstitute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereValuation($value)
 * @mixin \Eloquent
 */
class Qualification extends Model
{
    use HasFactory;

    protected $table = 'qualifications';
    protected $id = 'id';

    protected $fillable = [
        'start_date',
        'end_date',
        'in_progress',
        'institute',
        'name',
        'description',
        'valuation'
    ];

    public function user() {
        return $this->belongsTo( User::class);
    }
}

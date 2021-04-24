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

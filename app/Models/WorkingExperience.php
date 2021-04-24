<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

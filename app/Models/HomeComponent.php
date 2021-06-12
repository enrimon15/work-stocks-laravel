<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeComponent extends Model
{
    use HasFactory;

    protected $fillable = [
        'component_title_it',
        'component_title_en',
        'component_subtitle_it',
        'component_subtitle_en',
        'component_name',
        'active'
    ];

    public function home() {
        return $this->belongsTo(Home::class);
    }
}

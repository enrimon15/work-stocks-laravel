<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_title_it',
        'banner_title_en',
        'banner_subtitle_it',
        'banner_subtitle_en',
        'banner_img_path',
        'show_search_bar',
        'active'
    ];

    public function homeComponents() {
        return $this->hasMany(HomeComponent::class);
    }
}

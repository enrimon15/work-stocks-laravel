<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'title',
        'image_path'
    ];

    public function comments() {
        return $this->belongsToMany(User::class, 'news_comments')->using(NewsComment::class)->withTimestamps()->withPivot(['body', 'news_id', 'user_id', 'id']);
    }

    public function likes() {
        return $this->belongsToMany(User::class, 'news_likes')->using(NewsLike::class)->withTimestamps()->withPivot(['news_id', 'user_id', 'id']);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class NewsLike extends Pivot
{
    use HasFactory;

    public function news() {
        return $this->belongsTo(News::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

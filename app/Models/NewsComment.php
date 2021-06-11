<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\NewsComment
 *
 * @property-read \App\Models\News $news
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|NewsComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsComment query()
 * @mixin \Eloquent
 */
class NewsComment extends Pivot
{
    use HasFactory;

    public function news() {
        return $this->belongsTo(News::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

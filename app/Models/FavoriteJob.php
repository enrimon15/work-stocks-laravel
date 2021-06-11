<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\FavoriteJob
 *
 * @property int $id
 * @property int $user_id
 * @property int $job_offer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteJob newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteJob query()
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteJob whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteJob whereJobOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteJob whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteJob whereUserId($value)
 * @mixin \Eloquent
 */
class FavoriteJob extends Pivot
{
    protected $table = 'favorite_jobs';
    use HasFactory;
    public $incrementing = true;
}

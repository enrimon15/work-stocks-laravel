<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Skill
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $assestment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereAssestment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereUserId($value)
 * @mixin \Eloquent
 */
class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';
    protected $id = 'id';

    protected $fillable = [
        'name',
        'assestment'
    ];

    public function user() {
        return $this->belongsTo( User::class);
    }
}

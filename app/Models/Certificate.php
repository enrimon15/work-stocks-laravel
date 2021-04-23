<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Certificate
 *
 * @property int $id
 * @property int $user_id
 * @property string $date
 * @property string|null $end_date
 * @property string|null $link
 * @property string $credential
 * @property string $society
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereCredential($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereSociety($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Certificate whereUserId($value)
 * @mixin \Eloquent
 */
class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificates';
    protected $id = 'id';

    protected $fillable = [
        'date',
        'end_date',
        'link',
        'credential',
        'society'
    ];

    public function user() {
        return $this->belongsTo( User::class);
    }
}

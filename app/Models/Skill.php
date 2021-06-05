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

    public function getSkillLevel() {
        switch ($this->assestment) {
            case 'beginner':
                return 33;
                break;
            case 'intermediate':
                return 66;
                break;
            case 'advanced':
                return 100;
                break;
            default:
                return 0;
                break;
        }
    }

    public function getSkillColor() {
        switch ($this->assestment) {
            case 'beginner':
                return 'danger';
                break;
            case 'intermediate':
                return 'warning';
                break;
            case 'advanced':
                return 'success';
                break;
            default:
                return null;
                break;
        }
    }
}

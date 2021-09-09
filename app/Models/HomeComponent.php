<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HomeComponent
 *
 * @property int $id
 * @property int $home_id
 * @property string $component_name
 * @property string|null $component_title_it
 * @property string|null $component_title_en
 * @property string|null $component_subtitle_it
 * @property string|null $component_subtitle_en
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Home $home
 * @method static \Illuminate\Database\Eloquent\Builder|HomeComponent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeComponent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeComponent query()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeComponent whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeComponent whereComponentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeComponent whereComponentSubtitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeComponent whereComponentSubtitleIt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeComponent whereComponentTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeComponent whereComponentTitleIt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeComponent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeComponent whereHomeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeComponent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeComponent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FooterMenu
 *
 * @property int $id
 * @property int $footer_id
 * @property string $title_it
 * @property string $title_en
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Footer $footer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FooterMenuItem[] $footerMenuItems
 * @property-read int|null $footer_menu_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenu whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenu whereFooterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenu whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenu whereTitleIt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FooterMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_it',
        'title_en',
        'active'
    ];

    public function footerMenuItems() {
        return $this->hasMany(FooterMenuItem::class);
    }

    public function footer() {
        return $this->belongsTo(Footer::class);
    }
}

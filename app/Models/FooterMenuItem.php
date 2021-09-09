<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FooterMenuItem
 *
 * @property int $id
 * @property int $footer_menu_id
 * @property string $title_it
 * @property string $title_en
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\FooterMenu $footerMenu
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenuItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenuItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenuItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenuItem whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenuItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenuItem whereFooterMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenuItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenuItem whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenuItem whereTitleIt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FooterMenuItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FooterMenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_it',
        'title_en',
        'body'
    ];

    public function footerMenu() {
        return $this->belongsTo(FooterMenu::class);
    }
}

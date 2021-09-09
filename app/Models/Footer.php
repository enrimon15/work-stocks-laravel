<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Footer
 *
 * @property int $id
 * @property string $logo
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FooterMenu[] $footerMenus
 * @property-read int|null $footer_menus_count
 * @method static \Illuminate\Database\Eloquent\Builder|Footer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Footer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Footer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Footer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Footer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Footer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Footer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Footer whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Footer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Footer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Footer extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'address',
        'logo'
    ];

    public function footerMenus() {
        return $this->hasMany(FooterMenu::class);
    }
}

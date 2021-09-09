<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Home
 *
 * @property int $id
 * @property string $banner_title_it
 * @property string $banner_subtitle_it
 * @property string $banner_title_en
 * @property string $banner_subtitle_en
 * @property string $banner_img_path
 * @property int $show_search_bar
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\HomeComponent[] $homeComponents
 * @property-read int|null $home_components_count
 * @method static \Illuminate\Database\Eloquent\Builder|Home newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Home newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Home query()
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereBannerImgPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereBannerSubtitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereBannerSubtitleIt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereBannerTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereBannerTitleIt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereShowSearchBar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_title_it',
        'banner_title_en',
        'banner_subtitle_it',
        'banner_subtitle_en',
        'banner_img_path',
        'show_search_bar',
        'active'
    ];

    public function homeComponents() {
        return $this->hasMany(HomeComponent::class);
    }
}

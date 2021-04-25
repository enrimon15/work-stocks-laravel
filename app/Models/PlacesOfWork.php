<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PlacesOfWork
 *
 * @property int $id
 * @property int $company_id
 * @property string $city
 * @property string $country
 * @property string $address
 * @property int $primary
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlacesOfWork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlacesOfWork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlacesOfWork query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlacesOfWork whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlacesOfWork whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlacesOfWork whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlacesOfWork whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlacesOfWork whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlacesOfWork whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlacesOfWork wherePrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlacesOfWork whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlacesOfWork whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PlacesOfWork extends Model
{
    use HasFactory;
}

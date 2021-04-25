<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CommercialContact
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $telephone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CommercialContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommercialContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommercialContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommercialContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommercialContact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommercialContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommercialContact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommercialContact whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommercialContact whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CommercialContact extends Model
{
    use HasFactory;

    public function company() {
        return $this->hasOne(Company::class);
    }
}

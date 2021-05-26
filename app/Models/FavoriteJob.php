<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FavoriteJob extends Pivot
{
    protected $table = 'favorite_jobs';
    use HasFactory;
    public $incrementing = true;
}

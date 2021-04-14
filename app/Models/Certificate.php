<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

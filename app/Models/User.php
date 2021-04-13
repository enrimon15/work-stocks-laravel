<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Models\Role;

class User extends \TCG\Voyager\Models\User
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $id = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function hasRole($role) {
        $roles = $this->roles()->where('name', $role)->count();
        if ($roles == 1) {
            return true;
        }
        return false;
    }

    public function profile() {
        return $this->hasOne( UserProfile::class);
    }

    public function qualifications() {
        return $this->hasMany( Qualification::class);
    }

    public function certificates() {
        return $this->hasMany( Certificate::class);
    }

    public function skills() {
        return $this->hasMany( Skill::class);
    }

    public function workingExperiences() {
        return $this->hasMany( WorkingExperience::class);
    }
}

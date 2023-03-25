<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // ROLE
    const ROLE_MEMBER  = 0;
    const ROLE_OFFICER = 1;
    const ROLE_ADMIN   = 2;

    // IS ACTIVE
    const IS_ACTIVE   = 1;
    const IS_INACTIVE = 0;

    use HasApiTokens, HasFactory, Notifiable, Uuid;

    protected $fillable = [
        'officer_id',
        'username',
        'email',
        'password',
        'name',
        'avatar',
        'role',
        'is_active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setInactive(): void
    {
        $this->is_active = self::IS_INACTIVE;
        $this->save();
    }
}

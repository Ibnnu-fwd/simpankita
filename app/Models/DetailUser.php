<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory, Uuid;

    protected $table = 'detail_users';

    protected $fillable = [
        'user_id',
        'name',
        'avatar',
        'address',
        'sex',
        'job',
        'phone',
        'birth_date',
        'created_by',
        'updated_by',
        'is_active',
    ];

    public function setInactive()
    {
        $this->is_active = 0;
        $this->save();
    }

    // RELATIONSHIP
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

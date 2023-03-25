<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    CONST IS_ACTIVE   = 1;
    CONST IS_INACTIVE = 0;

    use HasFactory, Uuid;

    public $table = 'officers';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'sex',
        'created_by',
        'is_active'
    ];

    public function setInactive(): void
    {
        $this->is_active = self::IS_INACTIVE;
        $this->save();
    }
}

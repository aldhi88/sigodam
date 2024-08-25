<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded = [];

    // relation
    public function roles():BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}

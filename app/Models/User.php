<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $guarded = [];

    protected $hidden = ['password'];
    // relation
    public function roles():BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function sekolah():HasOne
    {
        return $this->hasOne(Sekolah::class, 'user_id', 'id');
    }
}

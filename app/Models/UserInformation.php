<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInformation extends Model
{
    protected $fillable = ['user_id', 'first_name', 'last_name', 'gender'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

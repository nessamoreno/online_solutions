<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'imagen',
        'id_user'
    ];


    public function user():belongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function user_has_may():HasMany
    {
        return $this->hasMany(Chat::class,'id');
    }
}

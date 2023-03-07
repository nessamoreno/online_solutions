<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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
}

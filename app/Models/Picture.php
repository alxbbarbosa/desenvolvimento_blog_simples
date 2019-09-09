<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'original_name',
        'stored_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
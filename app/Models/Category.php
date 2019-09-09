<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
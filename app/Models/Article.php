<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use \Conner\Tagging\Taggable;

    protected $fillable = [
        'user_id',
        'category_id',
        'like',
        'title',
        'body',
        'active',
        'resume'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function approvedComments()
    {
        return $this->hasMany(Comment::class)
            ->whereNull('parent_id')
            ->where('approved', true);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
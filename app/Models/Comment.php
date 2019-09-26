<?php

namespace App\Models;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'approved',
        //'user_id',
        'article_id',
        'parent_id',
        'name',
        'picture',
        'homepage',
        'email',
        'ip_address',
        'body',
        'likes',
        'deslikes'
    ];

    /*
    public function user()
    {
        return $this->belongsTo(User::class);
    }*/

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function comment()
    {
        return $this->belongsTo(self::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function approvedReplies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->where('approved', true);
    }
}
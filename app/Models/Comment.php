<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment_id',
        'article_id',
        'name',
        'picture',
        'homepage',
        'email',
        'ip_address',
        'body',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function comment()
    {
        return $this->belongsTo(self::class);
    }
}
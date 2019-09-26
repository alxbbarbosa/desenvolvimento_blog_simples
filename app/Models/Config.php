<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'copyright',
        'link_facebook',
        'link_twitter',
        'link_google_plus',
        'link_instagram',
        'link_github',
        'link_flickr',
        'link_skype',
        'paragraph_title_footer',
        'paragraph_footer',
        'allows_registration',
    ];

}
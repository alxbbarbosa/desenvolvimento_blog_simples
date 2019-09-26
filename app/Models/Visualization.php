<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visualization extends Model
{
    protected $fillable = [
        'ip_address',
        'date',
        'article_id',
        'lat',
        'long',
        'city',
        'state',
        'country',
        'iso_code',
        'timezone'
    ];
    public $timestamps  = false;

    public static function addVisualizaton($ip_address, $date,
                                           $article_id = null)
    {
        $find = geoip()->getLocation($ip_address);

        return self::create([
                'ip_address' => $ip_address,
                'date' => $date,
                'article_id' => $article_id,
                'lat' => $find->lat,
                'long' => $find->lon,
                'city' => $find->city,
                'state' => $find->state,
                'country' => $find->country,
                'iso_code' => $find->iso_code,
                'timezone' => $find->timezone
        ]);
    }

    public static function haveAlreadyViewed($ip_address, $date,
                                             $article_id = null)
    {
        return self::where([
                ['ip_address', $ip_address],
                ['date', $date],
                ['article_id', $article_id]])->count() > 0;
    }
}
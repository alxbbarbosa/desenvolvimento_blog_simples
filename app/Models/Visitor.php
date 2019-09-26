<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'date',
        'lat',
        'long',
        'city',
        'state',
        'country',
        'iso_code',
        'timezone'
    ];
    public $timestamps  = false;

    public static function addVisitor($ip_address, $date)
    {
        $find = geoip()->getLocation($ip_address);

        return self::create([
                'ip_address' => $ip_address,
                'date' => $date,
                'lat' => $find->lat,
                'long' => $find->lon,
                'city' => $find->city,
                'state' => $find->state,
                'country' => $find->country,
                'iso_code' => $find->iso_code,
                'timezone' => $find->timezone
        ]);
    }

    public static function haveAlreadyVisited($ip_address, $date)
    {
        return self::where([
                ['ip_address', $ip_address],
                ['date', $date]
            ])->count() > 0;
    }
}
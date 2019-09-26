<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Visitor;
use Faker\Generator as Faker;

$visitors = array_map(function($e) {
    return geoip()->getLocation($e['ip_address']);
}, Visitor::limit(10)->get()->toArray());


$factory->define(Visitor::class,
    function (Faker $faker) {
    $data             = [
        'ip_address' => $faker->ipv4,
        'date' => $faker->dateTimeThisMonth->format('Y-m-d')
    ];
    $find             = geoip()->getLocation($data['ip_address']);
    $data['lat']      = $find->lat;
    $data['long']     = $find->lon;
    $data['city']     = $find->city;
    $data['state']    = $find->state;
    $data['country']  = $find->country;
    $data['iso_code'] = $find->iso_code;
    $data['timezone'] = $find->timezone;
    return $data;
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MessageChannel;
use Faker\Generator as Faker;

$factory->define(MessageChannel::class, function (Faker $faker) {
    return [
        'channel_name' => 'public'
    ];
});

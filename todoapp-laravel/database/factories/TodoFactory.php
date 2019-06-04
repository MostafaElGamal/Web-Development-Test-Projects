<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        'name'=>$faker -> sentence(2),
        'descrption'=>$faker -> paragraph(4),
        'completed' => false
    ];
});

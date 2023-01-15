<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AudienceType;
use Faker\Generator as Faker;

$factory->define(AudienceType::class, function (Faker $faker) {
    return [
        'order' => $faker->unique()->randomElement([1,2,3,4,5,6,7,8,9]),
        'audience_type' => $faker->unique()->randomElement(['Physicians','Pharmacists','PharmTechs','Nurses','Physician Assistants','Psychologists','Optometrists','Social Workers','Dentists']),
    ];
});

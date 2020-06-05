<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Utilisateur;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;


$factory->define(Utilisateur::class, function (Faker $faker) {
    return [
        'Nom' => $faker->lastName,
        'Prenom' => $faker->firstName(null),
        'NomCompagnie' => $faker->company,
        'DateInscription' => $faker->dateTime('now', null),
        'IDAdresse' => '1',
        'NumeroTelephone' => $faker->phoneNumber,
        'Courriel' => $faker->unique()->safeEmail,
        'ZoneService' => '0',
        'Photo' => $faker->imageUrl(),
        'Password' => Hash::make('password')
    ];
});

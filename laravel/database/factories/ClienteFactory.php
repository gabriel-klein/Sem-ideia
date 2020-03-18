<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'idade' => $faker->numberBetween($min = 14, $max = 60),
        'cel1' => $faker->phoneNumber ,
        'cel2' => $faker->phoneNumber ,
        'h_disponivel' =>  $faker->randomElement($array = array ('Manhã','Tarde','Integral')),
        'aprendiz' => $faker->randomElement($array = array ('Sim','Não')),
    ];
});

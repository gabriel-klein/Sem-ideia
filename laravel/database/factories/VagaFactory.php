<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vaga;
use Faker\Generator as Faker;

$factory->define(Vaga::class, function (Faker $faker) {
    return [
        'funcao' => $faker->randomElement($array = array ('Operador(a) de Caixa','Coordenador(a)/Gerente de Loja','Vigia/Prevenção de perdas','Estoquista','Babá/Cuidador','Estimulador','Cozinheiro','Garçom/Garçonete','Atendente de Telemarketing')),
        'descricao'=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'quantidade'=> $faker->randomDigitNotNull,
        'email_de_contato'=> $faker->companyEmail,
        'status'=> $faker->randomElement($array = array ('Ativa','Desativada')),
        'empresa_id'=>$faker->numberBetween($min = 1, $max = 20),	
    ];
});

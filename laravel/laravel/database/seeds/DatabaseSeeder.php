<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('empresas')->insert([
        	'cnpj' => '14.572.457.0001-85',
        	'name' => 'ADC Company',
        	'email'=> 'ADC@company.com.br',
        	'password'=> Hash::make('12345678'),
        	'razao_social' => 'ADC company Ltda',
        ]);
    }
}

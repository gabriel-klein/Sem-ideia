<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Conhecimento;

class CreateConhecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conhecimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->timestamps();
        });

    Conhecimento::create([
            'id' =>'10',
            'nome' => 'escolaridade',
    ]);
    Conhecimento::create([
            'nome' => 'excel',
    ]);
    Conhecimento::create([
            'nome' => 'word',
    ]);
    Conhecimento::create([
            'nome' => 'ingles',
    ]);
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conhecimentos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_vaga', function (Blueprint $table) {
            $table->unsignedBigInteger('vaga_id');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();

            $table->primary(['vaga_id', 'cliente_id']);
            
            $table->foreign('vaga_id')->references('id')->on('vagas');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_vagas');
    }
}

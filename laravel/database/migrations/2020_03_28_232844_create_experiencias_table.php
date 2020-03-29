<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('local');
            $table->string('descricao');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->enum('comprovacao', ['Sim', 'Não']);
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();

            $table->foreign('cliente_id')
                  ->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiencias');
    }
}

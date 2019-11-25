<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('funcao');                                                                     
            $table->string('descricao');
            $table->integer('quantidade');
            $table->string('email_de_contato')->unique();
            $table->enum('status', ['Ativa', 'Desativada']);
            $table->unsignedBigInteger('empresa_id');
            $table->timestamps();
            $table->foreign('empresa_id')
                  ->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vagas');
    }
}

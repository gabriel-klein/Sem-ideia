<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConhecimentoVagaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conhecimento_vaga', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nivel')->nullable();
            $table->unsignedBigInteger('conhecimento_id');
            $table->unsignedBigInteger('vaga_id');
            $table->timestamps();    
            
            $table->foreign('conhecimento_id')
                  ->references('id')->on('conhecimentos');
            $table->foreign('vaga_id')
                  ->references('id')->on('vagas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conhecimento_vaga');
    }
}

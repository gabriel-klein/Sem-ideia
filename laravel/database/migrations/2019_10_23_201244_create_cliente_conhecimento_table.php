<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteConhecimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_conhecimento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nivel');
            $table->unsignedBigInteger('conhecimento_id');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();    
            
            $table->foreign('cliente_id')
                  ->references('id')->on('clientes');
            $table->foreign('conhecimento_id')
            ->references('id')->on('conhecimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_conhecimento');
    }
}

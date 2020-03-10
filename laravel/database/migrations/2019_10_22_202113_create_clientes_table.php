<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idade');
            $table->string('cel1')->unique();
            $table->string('cel2')->nullable();
            $table->string('bairro');
            $table->enum('h_disponivel', ['Manhã', 'Tarde', 'Integral']);
            $table->enum('aprendiz', ['Sim', 'Não'])->default('Não');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}

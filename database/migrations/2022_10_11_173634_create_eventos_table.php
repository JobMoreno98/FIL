<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('participantes')->nullable();
            $table->string('autor')->nullable();
            $table->string('coordinador');
            $table->string('organiza');
            $table->string('salon');
            $table->string('fecha');
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->smallInteger('anio');
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
        Schema::dropIfExists('eventos');
    }
}

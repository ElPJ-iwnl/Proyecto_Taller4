<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('solicitudes', function (Blueprint $table) {
    $table->id();
    $table->string('tema');
    $table->text('descripcion');
    $table->string('area');
    $table->date('fecha_registro');
    $table->date('fecha_cierre')->nullable();
    $table->string('estado');
    $table->text('observacion')->nullable();
    $table->string('usuario');
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
        Schema::dropIfExists('solicitudes');
    }
}

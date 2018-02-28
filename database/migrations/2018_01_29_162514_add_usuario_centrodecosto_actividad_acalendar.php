<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsuarioCentrodecostoActividadAcalendar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fullcalendareventos', function (Blueprint $table) {
            //agregar campos usuario, centrodecosto y actividad
            $table->string('usuario')->nullable()->unsigned();
            $table->string('centrodecostos')->nullable();
            $table->string('actividad')->nullable();
            $table->string('usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fullcalendareventos', function (Blueprint $table) {
            //Eliminar de la tabla los siguientes Campos
            $table->dropColumn('usuarios');
            $table->dropColumn('centrodecostos');
            $table->dropColumn('activida');
            
        });
    }
}

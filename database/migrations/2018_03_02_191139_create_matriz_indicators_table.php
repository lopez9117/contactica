<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatrizIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriz_indicators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('numerador');
            $table->string('denominador');
            $table->float('meta');
            $table->integer('user_id');
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
        Schema::drop('matriz_indicators');
    }
}

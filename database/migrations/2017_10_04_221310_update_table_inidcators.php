<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableInidcators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indicators', function (Blueprint $table) {
            //
            $table->string('nombre_del_numerador')->nullable();
            $table->string('nombre_del_denominador')->nullable();
            $table->string('año')->nullable();
            $table->string('mes')->nullable();
            $table->text('comentario')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indicators', function (Blueprint $table) {
            //
               $table->dropColumn('nombre_del_numerador');
            $table->dropColumn('nombre_del_denominador');
            $table->dropColumn('año');
            $table->dropColumn('mes');
            $table->dropColumn('comentario');
        });
    }
}

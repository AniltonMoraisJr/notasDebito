<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDespesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nota_id')->unsigned()->nullable()->index('fk_despesas_nota_id');
            $table->integer('tipo_despesa_id')->unsigned()->nullable()->index('fk_despesas_tipo_d_id');
            $table->decimal('valor', 15, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nota_id')->references('id')->on('notas');
            $table->foreign('tipo_despesa_id')->references('id')->on('tipos_despesa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('despesas');
    }
}

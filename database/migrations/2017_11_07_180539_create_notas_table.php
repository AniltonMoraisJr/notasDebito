<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->index('fk_notas_user_id');
            $table->integer('projeto_id')->unsigned()->nullable()->index('fk_notas_projeto_id');
            $table->integer('empresa_id')->unsigned()->nullable()->index('fk_notas_empresa_id');
            $table->integer('numero');
            $table->decimal('valor', 15, 2);
            $table->string('valor_por_extenso');
            $table->boolean('adiantamento');
            $table->decimal('adiantamento_valor', 15,2)->nullable();
            $table->decimal('saldo_devolver', 15, 2)->nullable();                        
            $table->date('data_vencimento');
            $table->date('data_emissao');
            $table->date('data_inicio_viagem');
            $table->date('data_final_viagem');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('projeto_id')->references('id')->on('projetos');
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notas');
    }
}

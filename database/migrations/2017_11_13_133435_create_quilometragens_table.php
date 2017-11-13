<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuilometragensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quilometragens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nota_id')->unsigned()->nullable()->index('fk_quilometragens_nota_id');
            $table->string('origem', 200);
            $table->string('destino', 200);
            $table->decimal('quantidade_km', 15, 2);
            $table->decimal('valor_por_km', 15, 2)->nullable();
            $table->decimal('valor_total_km', 15,2)->nullable();
            $table->date('data');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nota_id')->references('id')->on('notas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quilometragens');
    }
}

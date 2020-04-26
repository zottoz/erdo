<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item',10);
            $table->string('descricao');
            $table->string('um',5);
            $table->double('quantidade');
            $table->double('valor');
            $table->unsignedBigInteger('contrato_id');
            $table->timestamps();
            // itens da ppu pertencem a um contrato
            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppus');
    }
}

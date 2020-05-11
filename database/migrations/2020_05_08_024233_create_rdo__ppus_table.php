<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdoPpusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdo__ppus', function (Blueprint $table) {
            $table->unsignedBigInteger('rdo_id');
            $table->unsignedBigInteger('ppu_id');            
            $table->timestamps();
            $table->foreign('rdo_id')->references('id')->on('rdos')->onDelete('cascade');
            $table->foreign('ppu_id')->references('id')->on('ppus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rdo__ppus');
    }
}

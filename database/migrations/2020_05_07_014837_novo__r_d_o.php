<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NovoRDO extends Migration
{
    /**
     * Run the migrations...
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdos', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->integer('numero');
            $table->date('datainicio');
            $table->date('datatermino')->nullable();
            $table->string('localidade')->nullable();
            $table->string('tempo')->nullable();
            $table->string('qntpessoas')->nullable();
            $table->enum('status', array(0,1,2,3,4))->default(0);
            $table->unsignedBigInteger('contrato_id');
            $table->unsignedBigInteger('criador_id');
            $table->unsignedBigInteger('autorizador_id')->nullable();
            $table->timestamps();
            // uma rdo tem um usuario criador e um usuario liberador
            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
            $table->foreign('criador_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('autorizador_id')->references('id')->on('users')->onDelete('cascade');
                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rdos');
    }
}

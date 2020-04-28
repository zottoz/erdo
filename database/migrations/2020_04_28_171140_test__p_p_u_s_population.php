<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class TestPPUSPopulation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        (0, 1, 'Limp e Conserv de Áreas Internas-COA', 'MES', 24, 2658, 3)");

        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        (0, 2, 'Limp e Consv Áreas Livres e Externas-COA', 'MES', 24, 2100, 3)");

        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        (0, 3, 'Jardinagem/Manut. Paisagística-COA', 'MES', 24, 2658, 3)");

        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        (0, 6, 'Roçagem de Vegetação Alta-COA', 'M2', 600000, 0.37, 3)");

        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        ( 0, 12, 'Serv de Desinset Desrat', 'MES', 24, 1000, 3)");

        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        (0, 15, 'Higieniz de Reserv c/Capac até 2000L-COA', 'UN', 36, 289.75, 3)");

        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        (0, 18, 'Serv manut predial (civil e hidro)-COA', 'MES', 24, 12448.56, 3)");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

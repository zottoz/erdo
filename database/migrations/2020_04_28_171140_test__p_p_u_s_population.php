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
        /*
        //cria empresa fake
        DB::statement("
        INSERT INTO empresas(id, razao, cnpj, contato, telefone) VALUES
        (10, 'Empresa Enrrolada SA', '11.111.111/0001-00', 'Isaak Newton', '92-9999-9999')");

        DB::statement("
        INSERT INTO empresas(id, razao, cnpj, contato, telefone) VALUES
        (20, 'Trambulho Trabalhos Ltda', '22.222.2222/0001-00', 'Albert Einstein', '92-8888-9999')");

        //cria contrato fake
        DB::statement("
        INSERT INTO contratos(id, numero, objeto, inicio, fim, empresa_id) VALUES
        (2, '4600001111', 'servicos gerais', '2020-4-4', '2021-4-4', 10)");

        DB::statement("
        INSERT INTO contratos(id, numero, objeto, inicio, fim, empresa_id) VALUES
        (3, '4600001111', 'servicos gerais', '2020-4-4', '2021-4-4', 20)");
        */

        //cria os itens da ppu fake
        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        (1, 1, 'Limp e Conserv de Áreas Internas-COA', 'MES', 24, 2658, 1)");

        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        (2, 2, 'Limp e Consv Áreas Livres e Externas-COA', 'MES', 24, 2100, 1)");

        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        (3, 3, 'Jardinagem/Manut. Paisagística-COA', 'MES', 24, 2658, 1)");

        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        (4, 6, 'Roçagem de Vegetação Alta-COA', 'M2', 600000, 0.37, 1)");

        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        (5, 12, 'Serv de Desinset Desrat', 'MES', 24, 1000, 1)");

        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        (6, 15, 'Higieniz de Reserv c/Capac até 2000L-COA', 'UN', 36, 289.75, 1)");

        DB::statement("
        INSERT INTO ppus(id, item, descricao, um, quantidade, valor, contrato_id) VALUES
        (7, 18, 'Serv manut predial (civil e hidro)-COA', 'MES', 24, 12448.56, 1)");
        */
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

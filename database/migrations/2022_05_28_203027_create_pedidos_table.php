<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('CodigoDoCliente');
            $table->decimal('Total',19,2);
            $table->decimal('TotalDesconto',19,2);
            $table->decimal('TotalAcréscimo',19,2);
            $table->decimal('TotaldosProdutos',19,2);
            $table->integer('Modelo');
            $table->integer('Nota');
            $table->integer('Serie');
            $table->decimal('TotalTributos',19,2);
            $table->decimal('TotalIpi',19,2);
            $table->decimal('TotalPis',19,2);
            $table->decimal('TotalCofins',19,2);
            $table->decimal('TotalIcms',19,2);
            $table->decimal('TotalBase',19,2);
            $table->decimal('TotalBaseImcs',19,2);
            $table->decimal('TotalBaseSt',19,2);
            $table->decimal('TotalFrete',19,2);
            $table->decimal('TotalOutros',19,2);
            $table->Date('DtPedido');
            $table->decimal('TotalSt',19,2);
            $table->Date('Dataemissao');
            $table->Date('DataSaida');
            $table->string('Finalidade',100);
            $table->string('Natureza',100);
            $table->string('Devolucao');
            $table->string('Complementar');
            $table->integer('CodEmpresa');
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
        Schema::dropIfExists('pedidos');
    }
};

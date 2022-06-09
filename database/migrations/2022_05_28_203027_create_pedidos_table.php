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
            $table->decimal('TotalDesconto',19,2)->nullable()->default(NULL);;
            $table->decimal('TotalAcréscimo',19,2)->nullable()->default(NULL);;
            $table->decimal('TotaldosProdutos',19,2);
            $table->integer('Modelo')->nullable()->default(NULL);;
            $table->integer('Nota')->nullable()->default(NULL);;
            $table->integer('Serie')->nullable()->default(NULL);;
            $table->decimal('TotalTributos',19,2)->nullable()->default(NULL);;
            $table->decimal('TotalIpi',19,2)->nullable()->default(NULL);;
            $table->decimal('TotalPis',19,2)->nullable()->default(NULL);;
            $table->decimal('TotalCofins',19,2)->nullable()->default(NULL);;
            $table->decimal('TotalIcms',19,2)->nullable()->default(NULL);;
            $table->decimal('TotalBase',19,2)->nullable()->default(NULL);;
            $table->decimal('TotalBaseImcs',19,2)->nullable()->default(NULL);;
            $table->decimal('TotalBaseSt',19,2)->nullable()->default(NULL);;
            $table->decimal('TotalFrete',19,2)->nullable()->default(NULL);;
            $table->decimal('TotalOutros',19,2)->nullable()->default(NULL);;
            $table->Date('DtPedido');
            $table->decimal('TotalSt',19,2)->nullable()->default(NULL);;
            $table->Date('Dataemissao');
            $table->Date('DataSaida');
            $table->string('Finalidade',100);
            $table->string('Natureza',100)->nullable()->default(NULL);
            $table->string('Devolucao',1)->nullable()->default(NULL);;
            $table->string('Complementar',1)->nullable()->default(NULL);;
            $table->integer('CodEmpresa');
            $table->string('Tipo',100)->default('A Vista');
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

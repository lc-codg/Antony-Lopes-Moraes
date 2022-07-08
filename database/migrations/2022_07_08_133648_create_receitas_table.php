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
        Schema::create('receitas', function (Blueprint $table) {
            $table->id();
            $table->string('Descricao',100);
            $table->integer('CodCliente')->nullable()->default(NULL);
            $table->decimal('Total',19,2);
            $table->decimal('TotalDesconto',19,2)->nullable()->default(NULL);;
            $table->decimal('TotalAcréscimo',19,2)->nullable()->default(NULL);;;
            $table->decimal('TotaldosProdutos',19,2)->nullable()->default(NULL);;;
            $table->Date('Vencimento');
            $table->integer('Parcelas')->nullable()->default(NULL);;;;
            $table->Date('DataDaEntrada');
            $table->string('Boleta',100)->nullable()->default(NULL);
            $table->string('NotaFiscal',100)->nullable()->default(NULL);
            $table->string('Serie',100)->nullable()->default(NULL);
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
        Schema::dropIfExists('receitas');
    }
};

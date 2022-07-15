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
        Schema::create('contasa_recebers', function (Blueprint $table) {
            $table->id();
            $table->string('Barras',60)->nullable()->default(NULL);
            $table->string('Descricao',100);
            $table->integer('CodCliente');
            $table->decimal('Total',19,2);
            $table->decimal('TotalDesconto',19,2)->nullable()->default(NULL);
            $table->decimal('TotalAcréscimo',19,2)->nullable()->default(NULL);
            $table->Date('Vencimento');
            $table->integer('CodGrupo')->nullable()->default(NULL);
            $table->integer('CodSubGrupo')->nullable()->default(NULL);
            $table->integer('Parcelas')->nullable()->default(NULL);
            $table->Date('Dataemissao');
            $table->Date('Datarecebimento');
            $table->string('Boleta',100)->nullable()->default(NULL);
            $table->string('NotaFiscal',100)->nullable()->default(NULL);;
            $table->string('Serie',100)->nullable()->default(NULL);;
            $table->integer('CodEmpresa');
            $table->boolean('status');
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
        Schema::dropIfExists('contasa_recebers');
    }
};

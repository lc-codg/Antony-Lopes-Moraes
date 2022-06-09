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
        Schema::create('itens_compras', function (Blueprint $table) {
            $table->id();
            $table->string('Descricao',100);
            $table->string('Barras',20);
            $table->decimal('ValorUnitario',19,2);
            $table->decimal('Quantidade',19,2);
            $table->integer('NumeroDoPedido');
            $table->decimal('Subtotal',19,2);
            $table->decimal('Desconto',19,2)->nullable()->default(NULL);
            $table->decimal('Acrescimo',19,2)->nullable()->default(NULL);
            $table->decimal('Icms',19,2)->nullable()->default(NULL);
            $table->integer('Origem')->nullable()->default(NULL);
            $table->integer('Cst')->nullable()->default(NULL);
            $table->string('Ncm',20)->nullable()->default(NULL);
            $table->string('Cest',20)->nullable()->default(NULL);
            $table->string('Cfop',10)->nullable()->default(NULL);
            $table->string('CodPis',5)->nullable()->default(NULL);
            $table->string('CodCofins',5)->nullable()->default(NULL);
            $table->string('CodIpi',5)->nullable()->default(NULL);
            $table->decimal('BasePis',19,2)->nullable()->default(NULL);
            $table->decimal('Basecofins',19,2)->nullable()->default(NULL);
            $table->decimal('BaseIpi',19,2)->nullable()->default(NULL);
            $table->decimal('Peso',19,2)->nullable()->default(NULL);
            $table->decimal('Reducao',19,2)->nullable()->default(NULL);
            $table->decimal('Mva',19,2)->nullable()->default(NULL);
            $table->decimal('BaseIcms',19,2)->nullable()->default(NULL);
            $table->decimal('BaseSt',19,2)->nullable()->default(NULL);
            $table->decimal('St',19,2)->nullable()->default(NULL);
            $table->decimal('AlPis',19,2)->nullable()->default(NULL);
            $table->decimal('AlCofins',19,2)->nullable()->default(NULL);
            $table->decimal('AlIpi',19,2)->nullable()->default(NULL);
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
        Schema::dropIfExists('itens_compras');
    }
};

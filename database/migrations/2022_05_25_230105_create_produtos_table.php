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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('Descricao',100);
            $table->string('Barras',20);
            $table->decimal('ValorUnitario',19,2);
            $table->decimal('ValorPrazo',19,2);
            $table->decimal('ValorPromocao',19,2);
            $table->decimal('Custo',19,2);
            $table->decimal('Quantidade',19,2);
            $table->decimal('Icms',19,2);
            $table->integer('Origem');
            $table->integer('Cst');
            $table->string('Ncm',20);
            $table->string('Cest',20);
            $table->string('Cfop',10);
            $table->string('CodPis',5);
            $table->string('CodCofins',5);
            $table->string('CodIpi',5);
            $table->decimal('BasePis',19,2);
            $table->decimal('Basecofins',19,2);
            $table->decimal('BaseIpi',19,2);
            $table->decimal('Peso',19,2);
            $table->decimal('Reducao',19,2);
            $table->decimal('Mva',19,2);
            $table->decimal('BaseIcms',19,2);
            $table->decimal('BaseSt',19,2);
            $table->decimal('St',19,2);
            $table->decimal('AlPis',19,2);
            $table->decimal('AlCofins',19,2);
            $table->decimal('AlIpi',19,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};

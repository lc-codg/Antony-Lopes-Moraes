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
        Schema::create('arrecadacaos', function (Blueprint $table) {
            $table->id();
            $table->string('Descricao',100)->nullable()->default(NULL);
            $table->decimal('Valor',19,2)->nullable()->default(NULL);
            $table->date('DataRecebimento');
            $table->integer('CodEmpresa');
            $table->string('Numero',100)->nullable()->default(NULL);
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
        Schema::dropIfExists('arrecadacaos');
    }
};

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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('Nome',100);
            $table->string('CPF',11);
            $table->string('RG',9);
            $table->string('CNPJ',14);
            $table->string('Email',10);
            $table->string('Endereco',100);
            $table->string('Bairro',100);
            $table->integer('Numero');
            $table->boolean('PessoaJuridica');


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
        Schema::dropIfExists('clientes');
    }
};

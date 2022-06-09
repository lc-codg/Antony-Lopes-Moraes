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
        Schema::create('fornecedors', function (Blueprint $table) {
            $table->id();
            $table->string('Nome',200)->nullable()->default(NULL);;
            $table->string('Cnpj',15)->nullable()->default(NULL);
            $table->string('Cpf',15)->nullable()->default(NULL);
            $table->string('Rg',20)->nullable()->default(NULL);
            $table->string('Ie',20)->nullable()->default(NULL);
            $table->string('Razao',200)->nullable()->default(NULL);
            $table->string('Fantasia',200)->nullable()->default(NULL);
            $table->string('Endereco',200);
            $table->string('Bairro',100);
            $table->string('Cidade',100);
            $table->integer('Numero');
            $table->string('Cep',15);
            $table->string('UF',5);
            $table->string('Telefone',20)->nullable()->default(NULL);;
            $table->string('Email',100)->nullable()->default(NULL);;
            $table->string('Contato',100)->nullable()->default(NULL);;
            $table->string('Prazo',100)->nullable()->default(NULL);
            $table->string('Observacao',200)->nullable()->default(NULL);
            $table->string('Conta',20)->nullable()->default(NULL);;
            $table->string('Agencia',20)->nullable()->default(NULL);;
            $table->string('Tipo',50)->nullable()->default(NULL);;
            $table->decimal('Limite',19,2)->nullable()->default(NULL);
            $table->string('Exterior',1)->nullable()->default(NULL);
            $table->string('Juridico',1)->nullable()->default(NULL);
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
        Schema::dropIfExists('fornecedors');
    }
};

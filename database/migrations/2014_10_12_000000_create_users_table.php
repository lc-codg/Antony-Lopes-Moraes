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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('Financeiro',1)->nullable()->default(NULL);
            $table->string('Cadastro',1)->nullable()->default(NULL);
            $table->string('Relatorio',1)->nullable()->default(NULL);
            $table->string('Estorno',1)->nullable()->default(NULL);
            $table->string('Pagamento',1)->nullable()->default(NULL);
            $table->string('Fluxo',1)->nullable()->default(NULL);
            $table->string('Notas',1)->nullable()->default(NULL);
            $table->string('Vendas',1)->nullable()->default(NULL);
            $table->string('Compras',1)->nullable()->default(NULL);
            $table->string('Usuarios')->nullable()->default(NULL);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

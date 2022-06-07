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
            $table->boolean('Financeiro');
            $table->boolean('Cadastro');
            $table->boolean('Relatorio');
            $table->boolean('Estorno');
            $table->boolean('Pagamento');
            $table->boolean('Fluxo');
            $table->boolean('Notas');
            $table->boolean('Vendas');
            $table->boolean('Compras');
            $table->boolean('Usuarios');
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

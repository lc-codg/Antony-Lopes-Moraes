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
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->string('Descricao',100);
            $table->string('Barras',20);
            $table->decimal('ValorUnitario',19,2);
            $table->integer('Quantidade');
            $table->integer('NumeroDoPedido');
            $table->decimal('Subtotal',19,2);
            $table->decimal('Desconto',19,2);
            $table->decimal('Acrescimo',19,2);
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
        Schema::dropIfExists('itens');
    }
};

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
   
   public $timestamps = false;
    protected $fillable = [ 'id', 'Nome', 'Cnpj', 'Cpf','Rg',
     'Ie', 'Razao', 'Fantasia', 'Endereco', 'Bairro','Numero', 'Cidade', 'Cep',
      'Telefone', 'Email', 'Contato', 'Prazo', 'Observacao', 'Conta',
       'Agencia', 'Tipo', 'CodigoVendedor', 'Limite',
        'Bloqueio','UF', 'Exterior', 'Juridico'];

}

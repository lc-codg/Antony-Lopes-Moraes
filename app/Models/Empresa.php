<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =['id', 'Cnpj', 'Ie', 'Razao', 'Fantasia', 'Endereco',
     'Bairro', 'Cidade', 'Cep', 'Telefone', 'Email', 'Contato', 'Prazo',
     'Observacao', 'Conta', 'Agencia', 'Tipo', 'Numero', 'UF', 
      'updated_at'];
}

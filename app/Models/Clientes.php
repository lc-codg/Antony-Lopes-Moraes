<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [ 'id', 'Nome', 'CPF', 'RG', 'CNPJ', 'Email', 'Endereco', 'Bairro', 'Numero','Cidade','UF'];

}

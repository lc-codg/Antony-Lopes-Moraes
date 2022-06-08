<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContasBancarias extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id', 'created_at', 'updated_at', 'Banco', 
    'Saldo', 'Agencia', 'Tipo', 'Conta', 'Operacao', 'Descricao', 'CodEmpresa'];
}

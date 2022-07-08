<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receitas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id', 'Descricao', 'CodCliente', 'Total',
     'TotalDesconto', 'TotalAcréscimo', 'TotaldosProdutos', 'Vencimento', 'Parcelas', 'Dataemissao', 'DataDaEntrada', 
    'Boleta', 'NotaFiscal', 'Serie', 'CodEmpresa', 'created_at', 'updated_at'];
}

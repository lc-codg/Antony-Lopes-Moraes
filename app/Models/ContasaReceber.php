<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContasaReceber extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id', 'Barras', 'Descricao', 'CodCliente', 
    'Total', 'TotalDesconto', 'TotalAcréscimo', 'TotaldosProdutos', 'Vencimento',
     'CodGrupo', 'CodSubGrupo', 'Parcelas', 'Dataemissao', 'Vencimento','Datarecebimento',
     'Boleta', 'NotaFiscal', 'Serie', 'CodEmpresa', 'created_at', 'updated_at','status'];
}

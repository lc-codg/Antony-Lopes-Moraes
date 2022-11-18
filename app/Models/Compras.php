<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['id', 'CodigoDoCliente', 'Total', 'TotalDesconto', 'TotalAcréscimo',
    'TotaldosProdutos', 'Modelo', 'Nota', 'Serie', 'TotalTributos', 'TotalIpi', 'TotalPis',
     'TotalCofins', 'TotalIcms', 'TotalBase', 'TotalBaseImcs', 'TotalBaseSt', 'TotalFrete',
     'TotalOutros', 'DtPedido', 'TotalSt', 'Dataemissao',
     'DataSaida', 'Finalidade', 'Natureza', 'Devolucao', 'Complementar', 'CodEmpresa','Tipo'];
}

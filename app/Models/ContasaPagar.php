<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContasaPagar extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id', 'Barras', 'Descricao', 'CodFornecedor', 'Total', 'TotalDesconto', 'TotalAcréscimo', 'Vencimento', 'CodGrupo', 'CodSubGrupo', 'Parcelas', 'Dataemissao', 'Datarecebimento', 'Boleta', 'NotaFiscal', 'Serie', 'CodEmpresa', 'created_at', 'updated_at','status'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id', 'Descricao', 'Barras', 'ValorUnitario',
     'ValorPrazo', 'ValorPromocao', 'Custo', 'Quantidade', 'Icms', 'Origem',
      'Cst', 'Ncm', 'Cest', 'Cfop', 'CodPis', 'CodCofins', 'CodIpi', 'BasePis', 
      'Basecofins', 'BaseIpi',
     'Peso', 'Reducao', 'Mva', 'BaseIcms', 'BaseSt', 'St', 'AlPis', 'AlCofins', 'AlIpi'];
}

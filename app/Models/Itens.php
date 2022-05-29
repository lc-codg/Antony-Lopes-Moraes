<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itens extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id','Descricao', 'Barras', 'ValorUnitario', 'Quantidade', 'NumeroDoPedido', 'Subtotal', 'Desconto', 'Acrescimo'];
}

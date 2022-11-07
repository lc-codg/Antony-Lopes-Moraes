<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrecadacao extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =['id','Descricao','Valor','DataRecebimento','CodEmpresa','Numero','conta'];
}

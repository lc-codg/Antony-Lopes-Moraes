<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FornecedorModel extends Model
{
    use HasFactory;
    protected $fillable =['Nome','CNPJ'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parcial extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =['id','data','valor','usuario','id_original','pessoa','conta','CodEmpresa'];
}

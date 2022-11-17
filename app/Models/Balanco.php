<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balanco extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id', 'Data','Valor','created_at','updated_at','CodEmpresa'];

}

<?php

namespace App\Classes;

use App\Models\ContasaPagar;
use App\Models\ContasaReceber;

class Operacoes
{
    public function Quitar($id, $tipo)
    {
        if ($tipo === 'Pagar') {
            $ContasaPagar = ContasaPagar::findOrFail($id);
            $ContasaPagar->update([
                'status' => 1,
            ]);
        } elseif ($tipo === 'Receber') {
            $ContasaReceber = ContasaReceber::findOrFail($id);
            $ContasaReceber->update([
                'status' => 1,
            ]);

            
        }
    }
    public function Estornar($id, $tipo)
    {
        if ($tipo ==='Pagar') {
            $ContasaPagar = ContasaPagar::findOrFail($id);
            $ContasaPagar->update([
                'status' => 0,
            ]);
        } elseif ($tipo === 'Receber') {
            $ContasaReceber = ContasaReceber::findOrFail($id);
            $ContasaReceber->update([
                'status' => 0,
            ]);
        }
    }
}

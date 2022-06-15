<?php

namespace App\Classes;

use App\Models\ContasaPagar;
use App\Models\ContasaReceber;

class Operacoes
{
    public function Quitar($id, $tipo)
    {
        if ($tipo == 'Pagar') {
            $ContasaPagar = ContasaPagar::findOrFail($id);
            $ContasaPagar->update([
                'status' => True
            ]);
        } elseif ($tipo == 'Receber') {
            $ContasaReceber = ContasaReceber::findOrFail($id);
            $ContasaReceber->update([
                'status' => True,
            ]);

            
        }
    }
    public function Estornar($id, $tipo)
    {
        if ($tipo == 'Pagar') {
            $ContasaPagar = ContasaPagar::findOrFail($id);
            $ContasaPagar->update([
                'status' => False
            ]);
        } elseif ($tipo == 'Receber') {
            $ContasaReceber = ContasaReceber::findOrFail($id);
            $ContasaReceber->update([
                'status' => False,
            ]);
        }
    }
}

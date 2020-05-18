<?php

namespace App;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Model;

class Ppu extends Model
{
    protected $fillable = [
        'item','descricao', 'um', 'quantidade', 'valor', 'contrato_id'
    ];

    /* retorna o num contrato associado ao item da ppu */
    public function contrato()
    {
        return $this->belongsTo('App\Contrato', 'contrato_id');
    }

    public function rdos()
    {
        return $this->belongsToMany(Rdo::class, 'rdo_ppu');
    }

    public static function idItem($contratoId, $item)
    {
        $ppu = Ppu::where('contrato_id', $contratoId)->where('item', $item)->get()->first();

        if($ppu instanceof Model)
        {
            return $ppu->id;
        }
        else
        {
            throw new ModelNotFoundException('Erro: Item PPU inválido');

            return false;

        }
    }

}

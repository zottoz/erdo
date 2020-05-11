<?php

namespace App;

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
        return $this->belongsToMany(Rdo::class, 'rdo__ppus');
    }

}

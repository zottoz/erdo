<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    //
    protected $fillable = [
        'numero', 'objeto', 'inicio', 'fim', 'empresa_id'
    ];

    /* retorna a empresa associada ao Contrato. */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }


    /* retorna os itens da ppu */
    public function itensPpu()
    {
        return $this->hasMany(Ppu::class);
    }
    
    /* retorna os rdos do contrato */
    public function rdos()
    {
        return $this->hasMany(Rdo::class);
    }
}

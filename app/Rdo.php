<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contrato;
use App\User;

class Rdo extends Model
{
    //
    protected $fillable = [
        'numero','datainicio', 'datatermino', 'localidade', 'tempo', 'qntpessoas', 'status', 
        'contrato_id', 'criador_id', 'autorizador_id'
    ];

    /* retorna o Contrato. */
    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }

    /* retorna o Usuario que criou o RDO */
    public function criador()
    {
        return $this->belongsTo(User::class);
    }

    /* retorna o Usuario que autorizou o RDO */
    public function autorizador()
    {
        return $this->belongsTo(User::class);
    }

    public function itens()
    {
        return $this->belongsToMany(Ppu::class, 'rdo_ppu')->withPivot('quantidade');
    }
}

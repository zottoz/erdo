<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $fillable = [
        'razao', 'cnpj', 'contato', 'telefone'
    ];

    /* retorna todos os contratos que a empresa possui */
    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }
}

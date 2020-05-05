<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Ppu;


class ppuImport implements ToModel, WithHeadingRow
{

    public function __construct($contrato_id)
    {
        $this->contrato_id = $contrato_id;    
    }

    public function model(array $row)
    {
    
        if(empty($row["item"])) return;
        
        return new Ppu([
            'id'            => 0,
           'item'           => $row["item"],
           'descricao'      => $row["descricao"],
           'um'             => $row["um"],
           'quantidade'     => $row["quantidade"],
           'valor'          => $row["valor"],
           'contrato_id'   => $this->contrato_id
        ]);
    }
}

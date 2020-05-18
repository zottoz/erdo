<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdo_Ppu extends Model
{
    //
    protected $fillable = [
        'rdo_id', 'ppu_id', 'quantidade', 'status'
    ];
    
    protected $table = 'rdo_ppu';

    protected $primaryKey = 'rdo_id';


}

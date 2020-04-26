<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Contrato;
use App\Ppu;

class BuscaController extends Controller
{
    // retornar os dados da busca por item da ppu
    public function itensAjax2($contrato = 2)
    {
        $itens = Contrato::find($contrato)->itensPpu;
        return response()->json($itens, 201);
    }

    public function itensAjax(Request $request)
    {
        if($request->ajax())
        {
            $itens = Ppu::where('descricao', 'LIKE', '%'. $request->termo.'%')->get();

            if(count($itens)>0)
            {
                return response()->json($itens, 200);
            }
            else
            {
                return response()->json([],404);
            }

        }
    }
}

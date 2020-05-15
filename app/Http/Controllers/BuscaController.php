<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;

use App\Contrato;
use App\Empresa;
use App\Ppu;


class BuscaController extends Controller
{
    // retornar os dados da busca por item da ppu
    public function itensAjax(Request $request)
    {
        if($request->ajax())
        {
            clock($request->termo, $request->contratoId, $request);

            if(!$request->contratoId)
            {
                return response()->json([], 404); 
            }

            $itens = Ppu::where('descricao', 'like', '%'. $request->termo . '%')
                        ->where('contrato_id', $request->contratoId)->take(5)->get();
            
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

    // retornar os dados da busca por item da ppu
    public function dadosAjax(Request $request)
    {

        if($request->ajax())
        {
            $contrato = Contrato::find($request->termo);

            if($contrato instanceof Model)
            {
                return response()->json([$contrato->objeto, $contrato->empresa->razao], 200);
            }
            else
            {
                return response()->json(['Erro ao acessar os dados'],404);
            }

        }

    }

    // retornar a ppu de um contrato
    public function ppuAjax(Request $request)
    {

        if($request->ajax())
        {
            $contrato = Contrato::find($request->contratoId);

            if($contrato instanceof Model)
            {
                return response()->json($contrato->itensPpu, 200);
            }
            else
            {
                return response()->json('Erro ao acessar os dados',404);
            }

        }

    }
}

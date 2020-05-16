<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Empresa;
use App\Contrato;
use App\Ppu;
use App\Rdo_Ppu;
use Carbon\Carbon;
use App\Rdo;

class RdoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $rdos = Rdo::all();
        return view('rdo.index')->with('rdos', $rdos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contratos = Contrato::all();
        return view('rdo/novo')->with('contratos', $contratos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Response $response)
    {

        if($request->ajax())
        {

            $criadorId  =   Auth::id();
            $numeroRDO  =   $request->info[3] . '00'.(Rdo::count() + 1);
            $hoje       =   Carbon::now();

            $rdo = Rdo::create([
                'numero'        => $numeroRDO,
                'datainicio'    => $hoje,
                'localidade'    => $request->info[0],
                'tempo'         => $request->info[1],
                'qntpessoas'    => $request->info[2],
                'contrato_id'   => $request->info[3],
                'criador_id'    => $criadorId
            ]);
    
            foreach($request->itens as $item)
            {
                Rdo_Ppu::create([
                    'rdo_id'        => $rdo->id,
                    'ppu_id'        => Ppu::idItem( $request->info[3], $item['item']),
                    'quantidade'    => $item['quantidade']
                ]);
            }
           
            if($rdo instanceof model)
            {
                return response()->json('Rdo criado com sucesso', 200);       
            }
            else{
                return back()->withErrors([]);
            }

        } //requestAjax


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $rdo = Rdo::find($id);

        return view('rdo/exibir')->with('rdo', $rdo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }

    // altera status do rdo.. autorizador
    public function alteraStatus($id)
    {
        $rdo = Rdo::find($id);
        if($rdo->autorizador_id)
        {
            $rdo->autorizador_id = null;
        }
        else
        {
            $rdo->autorizador_id = Auth::user()->id;
        }
        $rdo->save();
        return redirect('rdo');
    }

}

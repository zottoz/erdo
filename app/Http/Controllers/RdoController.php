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
            $dados = json_decode($request->getContent(), false);
            return response()->json($request->dados[0]) ;

            //--------inicia aq
            $criadorId  =   Auth::id();
            $numeroRDO  =   Rdo::latest()->first()->id + 1;
            $hoje       =   Carbon::now();
            
            

            $rdo = Rdo::create([
                'numero'        => $numeroRDO,
                'datainicio'    => $hoje,
                'localidade'    => $dados['local'],
                'tempo'         => 0,
                'qntpessoas'    => 0,
                'contrato_id'   => 5,
                'criador_id'    => $criadorId
            ]);
    
            if($rdo instanceof model)
            {
                notify()->success('RDO criado com numero: ' . $numeroRDO );
                return back()->withSuccess([$numeroRDO]);        
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
}

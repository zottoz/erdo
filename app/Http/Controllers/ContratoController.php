<?php

namespace App\Http\Controllers;

use App\Contrato;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource...
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::all();
        return view('contrato/index')->with('contratos', $contratos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contrato/novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validacao = $request->validate(
            [
                'numero'     => 'bail|required',
                'objeto'     => 'required',
                'inicio'     => 'required',
                'fim'        => 'required',
                'empresa_id' => 'required'
        ]);

        if($validacao)
        {
            $empresa = Contrato::create($request->all());
            notify()->success('Contrato gravado com sucesso!');
            return back()->withSuccess('ok');
        }
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato = Contrato::find($id);

        if($contrato instanceof Model)
        {
            return view('contrato/exibir')->with('contrato', $contrato);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contrato = Contrato::find($id);

        return view('contrato/editar')->with('contrato',$contrato);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contrato = Contrato::find($id);
        
        $contrato->numero   = $request->input('numero');
        $contrato->objeto   = $request->input('objeto');
        $contrato->inicio   = $request->input('inicio');
        $contrato->fim      = $request->input('fim');
        
        $contrato->save();

        return redirect('contrato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = Contrato::find($id);
        $contrato->delete();
        return redirect('contrato');
    }
}

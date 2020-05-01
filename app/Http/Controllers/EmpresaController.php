<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use Illuminate\Database\Eloquent\Model;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empresas = Empresa::all();
        return view('empresa/index')->with('empresas',$empresas);
    }

    /**
     * Show the form for creating a new resource..
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empresa/novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacao = $request->validate(
            [
                'cnpj'      => 'bail|required',
                'razao'     => 'required',
                'contato'   => 'required',
                'telefone'  => 'required'
        ]);

        if($validacao)
        {
            $empresa = Empresa::create($request->all());
            notify()->success('Empresa foi gravada com sucesso!');
            return back()->withSuccess('ok');
        }
        return back()->withInput();

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
        $empresa = Empresa::find($id);

        if($empresa instanceof Model)
        {
            return view('empresa/exibir')->with('empresa', $empresa);
        }
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
        $empresa = Empresa::find($id);

        return view('empresa/editar')->with('empresa',$empresa);

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

        $empresa = Empresa::find($id);
        
        $empresa->cnpj      = $request->input('cnpj');
        $empresa->razao     = $request->input('razao');
        $empresa->contato   = $request->input('contato');
        $empresa->telefone  = $request->input('telefone');
        
        $empresa->save();

        return redirect('empresa');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
            $empresa = Empresa::find($id);
            $empresa->delete();
            return redirect('empresa');

    }
}

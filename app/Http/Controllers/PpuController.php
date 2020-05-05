<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ppu;
use App\Contrato;
use App\Imports\ppuImport;
use Maatwebsite\Excel\Facades\Excel;
//use Maatwebsite\Excel\Excel;

class PpuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::all();
        return view('ppu/index')->with('contratos',$contratos);
    }

    public function importar(Request $request)
    {
        $arquivo = $request->file('arquivo');
        $contrato = $request->input('contrato_id');
        Excel::import(new ppuImport($contrato), $arquivo);
        notify()->success('A PPU foi importada com sucesso!');
        return back()->withSuccess('ok');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ppu  $ppu
     * @return \Illuminate\Http\Response
     */
    public function show(Ppu $ppu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ppu  $ppu
     * @return \Illuminate\Http\Response
     */
    public function edit(Ppu $ppu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ppu  $ppu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ppu $ppu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ppu  $ppu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ppu $ppu)
    {
        //
    }
}

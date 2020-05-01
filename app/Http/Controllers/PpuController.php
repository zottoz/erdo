<?php

namespace App\Http\Controllers;

use App\Ppu;
use Illuminate\Http\Request;

class PpuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('ppu/index');
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

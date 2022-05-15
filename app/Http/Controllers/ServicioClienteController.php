<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\servicioCliente;
use Illuminate\Http\Request;

class ServicioClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('servicioCliente.create');
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
     * @param  \App\Models\servicioCliente  $servicioCliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $datos['cliente'] = Cliente::findOrFail($id);
        return view('servicioCliente.show',$datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\servicioCliente  $servicioCliente
     * @return \Illuminate\Http\Response
     */
    public function edit(servicioCliente $servicioCliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\servicioCliente  $servicioCliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, servicioCliente $servicioCliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\servicioCliente  $servicioCliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(servicioCliente $servicioCliente)
    {
        //
    }
}

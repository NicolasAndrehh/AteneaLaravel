<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF as PDF;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['clientes'] = Cliente::paginate(10);
        return view('clientes.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create',['submit' => 'Registrar cliente']);
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
        $request->validate([
            'nombres' => 'required|regex:/^[a-zA-ZÀ-ÿ\s]{4,}$/',
            'apellidos' => 'required|regex:/^[a-zA-ZÀ-ÿ\s]{4,}$/',
            'num_documento' => 'required|regex:/^[0-9]{6,}$/',
            'procedencia' => 'required|regex:/^[a-zA-Z\s\-]{2,35}$/',
            'telefono' => 'required|regex:/^[0-9]{10,16}$/',
            'email' => ['required','regex:/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/']
        ]);
        $datosCliente = $request->except('_token');

        Cliente::insert($datosCliente);
        // return response()->json($datosCliente);
        return redirect('/cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
        return redirect('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit',compact('cliente'),['submit' => 'Guardar cambios']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombres' => 'required|regex:/^[a-zA-ZÀ-ÿ\s]{4,}$/',
            'apellidos' => 'required|regex:/^[a-zA-ZÀ-ÿ\s]{4,}$/',
            'num_documento' => 'required|regex:/^[0-9]{6,}$/',
            'procedencia' => 'required|regex:/^[a-zA-Z\s\-]{2,35}$/',
            'telefono' => 'required|regex:/^[0-9]{10,16}$/',
            'email' => ['required','regex:/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/']
        ]);
        $datosCliente = $request->except('_token','_method');

        Cliente::where('id','=',$id)->update($datosCliente);
        // return response()->json($datosCliente);
        return redirect('/cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cliente = Cliente::findOrFail($id);

        Cliente::destroy($id);
        return redirect('/cliente');
    }

    public function pdf()
    {
        $clientes = Cliente::all();
        $clientes = compact('clientes');

        $pdf = PDF::loadView('clientes.pdf', $clientes);
        return $pdf->setPaper('a3', 'landscape')->stream('Reporte clientes');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Habitacion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datos['habitaciones']=Habitacion::paginate(12);
        // return view('habitaciones.index', $datos);

        return view('habitaciones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('habitaciones.create', ['submit'=>'Crear habitacion']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'num_habitacion' => 'required|regex:/^\d+$/',
            'num_personas' => 'required|regex:/^\d+$/',
            'descripcion' => 'required|regex:/^[A-Za-z0-9\s]+$/',
            'estado' => 'required',
            'inventario' => 'required|mimes:jpeg,png,jpg,gif',
            'foto' => 'required|mimes:jpeg,png,jpg,gif'
            
        ]);

        $datoshabitacion = $request->except('_token');

        if($request->hasFile('inventario')){
            $datoshabitacion['inventario']=$request->file('inventario')->store('habitaciones', 'public');
        }
        if($request->hasFile('foto')){
            $datoshabitacion['foto']=$request->file('foto')->store('habitaciones', 'public');
        }

        Habitacion::insert($datoshabitacion);
        return redirect('/habitacion');
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

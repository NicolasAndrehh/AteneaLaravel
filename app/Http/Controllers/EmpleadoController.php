<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados']=Empleado::paginate(8);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
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
            'direccion' => 'required|regex:/^[a-zA-ZÀ-ÿ0-9\s\#\.\/\_\-]{7,200}$/',
            'telefono' => 'required|regex:/^[0-9]{10,16}$/',
            'cargo' => 'required|regex:/^[a-zA-Z\s]+$/',
            'contrato' => 'required',
            'foto' => 'required'
        ]);

        $datosEmpleado = $request->except('_token');
        
        if($request->hasFile('contrato')){
            $datosEmpleado['contrato']=$request->file('contrato')->store('uploads', 'public');
        }
        if($request->hasFile('foto')){
            $datosEmpleado['foto']=$request->file('foto')->store('uploads', 'public');
        }

        Empleado::insert($datosEmpleado);
        return response()->json($datosEmpleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
        return view('empleado.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleado::destroy($id);
        return redirect('empleado');
    }
}

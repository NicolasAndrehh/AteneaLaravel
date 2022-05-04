<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function index()
    {
        //
        $datos['empleados']=Empleado::paginate(10);
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
        return view('empleado.create', ['submit'=>'Registrar empleado']);
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
            'contrato' => 'required|mimes:jpeg,png,jpg,gif',
            'foto' => 'required|mimes:jpeg,png,jpg,gif'
        ]);

        $datosEmpleado = $request->except('_token');
        
        if($request->hasFile('contrato')){
            $datosEmpleado['contrato']=$request->file('contrato')->store('empleados', 'public');
        }
        if($request->hasFile('foto')){
            $datosEmpleado['foto']=$request->file('foto')->store('empleados', 'public');
        }

        Empleado::insert($datosEmpleado);
        return redirect('/empleado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        return view('empleado.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id);

        return view('empleado.edit', compact('empleado'), ['submit'=>'Guardar cambios']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombres' => 'required|regex:/^[a-zA-ZÀ-ÿ\s]{4,}$/',
            'apellidos' => 'required|regex:/^[a-zA-ZÀ-ÿ\s]{4,}$/',
            'num_documento' => 'required|regex:/^[0-9]{6,}$/',
            'direccion' => 'required|regex:/^[a-zA-ZÀ-ÿ0-9\s\#\.\/\_\-]{7,200}$/',
            'telefono' => 'required|regex:/^[0-9]{10,16}$/',
            'cargo' => 'required|regex:/^[a-zA-Z\s]+$/',
            'contrato' => 'mimes:jpeg,png,jpg,gif',
            'foto' => 'mimes:jpeg,png,jpg,gif'
        ]);

        $datosEmpleado = $request->except('_token', '_method');

        if($request->hasFile('contrato')){
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->contrato);
            $datosEmpleado['contrato']=$request->file('contrato')->store('empleados', 'public');
        }
        if($request->hasFile('foto')){
            $empleado = Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->foto);
            $datosEmpleado['foto']=$request->file('foto')->store('empleados', 'public');
        }
        
        Empleado::where('id', '=' ,$id)->update($datosEmpleado);

        $empleado = Empleado::findOrFail($id);
        return view('empleado.show', compact('empleado'));
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
        $empleado = Empleado::findOrFail($id);
        if(Storage::delete('public/'.$empleado->foto) && Storage::delete('public/'.$empleado->contrato)){
            Empleado::destroy($id);
        }

        return redirect('empleado');
    }
}

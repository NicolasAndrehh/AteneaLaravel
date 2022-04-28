<?php

namespace App\Http\Controllers;

use App\Models\privilegios;
use App\Models\Rol;
use App\Models\RolPrivilegio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['roles'] = Rol::paginate(10);
        return view('rol.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('rol.create');
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
        // $privilegios = $datosRol->attributes['privilegios'];
        $datosRol = $request->except(['_token', 'privilegios']);
        $privilegios = $request->privilegios;
        // $datosRol['privilegios'] = $privilegiosString;
        // $privilegiosArray = explode(', ', $privilegiosString);

        Rol::insert($datosRol);
        $rolId = Rol::where('nombreRol','=',$request->nombreRol)->get('id');
        $rolId = $rolId[0]->id;
        foreach ($privilegios as $privilegio) {
            RolPrivilegio::create([
                'rolId' => $rolId,
                'privilegioId' => $privilegio,
            ]);
        }
        // return response()->json($privilegios);
        return redirect('/rol');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $rol = Rol::findOrFail($id);
        return view('rol.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rol = Rol::findOrFail($id);
        return view('rol.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosRol = $request->except(['_token','_method']);
        $privilegiosString = implode(', ', $request->privilegios);
        $datosRol['privilegios'] = $privilegiosString;

        Rol::findOrFail($id);
        Rol::where('id', '=' ,$id)->update($datosRol);

        $rol = Rol::findOrFail($id);
        return view('rol.show', compact('rol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Rol::destroy($id);
        RolPrivilegio::destroy($id);
        
        return redirect('rol');
    }
    
}

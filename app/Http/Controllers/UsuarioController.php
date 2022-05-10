<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios'] = User::paginate(12);
        return view('usuario.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuario.create', ['submit' => 'Registrar usuario']);
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
            'name' => 'required|regex:/^[0-9a-zA-ZÀ-ÿ\s\_\-]{4,}$/',
            'email' => ['required','regex:/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/'],
            'num_documento' => 'required|regex:/^[a-zA-ZÀ-ÿ0-9\s\#\.\/\_\-]{7,200}$/',
            'password' => "required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/",
            'password2' => 'required|same:password',
            'rol' => 'required|in:1,2',
            'foto' => 'required|mimes:jpeg,png,jpg,gif',
        ]);

        $datosUsuario = $request->except(['_token','password2', 'num_documento']);
        $documentoEmpleado = $request->num_documento;
        $empleadoId = Empleado::where('num_documento','=',$documentoEmpleado)->get('id');
        $empleadoId = $empleadoId[0]->id;
        array_push($datosUsuario, $empleadoId);


        //? Almacenamiento de foto *-----------------------*

        if($request->hasFile('foto')){
            $datosUsuario['foto']=$request->file('foto')->store('usuarios', 'public');
        };
        
        //? Insercion de usuario en base de datos *------------------------*

        User::create([
            'name' => $datosUsuario['name'],
            'email' => $datosUsuario['email'],
            'password' => bcrypt($datosUsuario['password']),
            'empleadoId' => $datosUsuario['0'],
            'rolId' => $datosUsuario['rol'],
            'foto' => $datosUsuario['foto'],
        ]);


        // return response()->json($datosUsuario);
        return redirect('/usuario');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $usuario = User::findOrFail($id);
        $empleado = Empleado::findOrFail($usuario->empleadoId);
        return view('usuario.show', compact('usuario', 'empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario = User::findOrFail($id);
        $empleado = Empleado::findOrFail($usuario->empleadoId);
        return view('usuario.edit', compact('usuario', 'empleado'), ['submit' => 'Guardar cambios']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|regex:/^[0-9a-zA-ZÀ-ÿ\s\_\-]{4,}$/',
            'email' => ['required','regex:/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/'],
            'num_documento' => 'required|regex:/^[a-zA-ZÀ-ÿ0-9\s\#\.\/\_\-]{7,200}$/',
            'password' => "required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/",
            'password2' => 'required|same:password',
            'rol' => 'required|in:1,2',
            'foto' => 'required|mimes:jpeg,png,jpg,gif',
        ]);

        $datosUsuario = $request->except(['_token','_method','password2','num_documento']);
        $documentoEmpleado = $request->num_documento;
        $empleadoId = Empleado::where('num_documento','=',$documentoEmpleado)->get('id');
        $empleadoId = $empleadoId[0]->id;
        array_push($datosUsuario, $empleadoId);


        //? Almacenamiento de foto *-----------------------*

        if($request->hasFile('foto')){
            $usuario = User::findOrFail($id);
            Storage::delete('public/'.$usuario->foto);
            $datosUsuario['foto']=$request->file('foto')->store('usuarios', 'public');
        };
        
        //? Insercion de usuario en base de datos *------------------------*

        User::where('id','=',$id)->update([
            'name' => $datosUsuario['name'],
            'email' => $datosUsuario['email'],
            'password' => $datosUsuario['password'],
            'empleadoId' => $datosUsuario['0'],
            'rolId' => $datosUsuario['rol'],
            'foto' => $datosUsuario['foto'],
        ]);
        
        // return response()->json($datosUsuario);

     

        $usuario = User::findOrFail($id);
        $empleado = Empleado::findOrFail($usuario->empleadoId);
        return view('usuario.show', compact('usuario', 'empleado'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $usuario = User::findOrFail($id);
        if(Storage::delete('public/'.$usuario->foto) && Storage::delete('public/'.$usuario->foto)){
            User::destroy($id);
        }

        return redirect('usuario');
    }
}

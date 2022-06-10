<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF as PDF;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index(Request $request)
    {
        //
        $rol = auth()->User()->rolId;


        $privilegios = \DB::table('rol_privilegios')
        ->join('privilegios', 'rol_privilegios.privilegioId', '=', 'privilegios.id')
        ->select('privilegios.nombrePrivilegio')
        ->where('rol_privilegios.rolId', '=', $rol)
        ->get();

    $isUserAdmin = false;
    $isRolAdmin = false;
    $canViewUsers = false;
    $canViewRoles = false;

    if($privilegios->contains('nombrePrivilegio', 'Administrar usuarios')){
        $isUserAdmin = true;
    }

    if($privilegios->contains('nombrePrivilegio', 'Consultar usuarios')){
        $canViewUsers = true;
    }

    if($privilegios->contains('nombrePrivilegio', 'Administrar roles')){
        $isRolAdmin = true;
    }

    if($privilegios->contains('nombrePrivilegio', 'Consultar roles')){
        $canViewRoles = true;
    }

    // $datos['usuarios'] = User::paginate(12);
    
    if($isUserAdmin || $canViewUsers){
        if($request->has('search')){
            $usuarios = User::where('name', 'LIKE', '%'.$request->search.'%')
            ->orWhere('email', 'LIKE', '%'.$request->search.'%')
            ->paginate(12);
        }else{
            $usuarios = User::All();
        }
        return view('usuario.index', compact('usuarios', 'isUserAdmin', 'canViewUsers', 'isRolAdmin', 'canViewRoles'));
    }else{
        $usuarios = User::where('id', auth()->user()->id)->get();
        return view('usuario.index', compact('usuarios', 'isUserAdmin', 'canViewUsers', 'isRolAdmin', 'canViewRoles'));
    }





        
        // return view('usuario.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol = auth()->User()->rolId;

        $privilegios = \DB::table('rol_privilegios')
        ->join('privilegios', 'rol_privilegios.privilegioId', '=', 'privilegios.id')
        ->select('privilegios.nombrePrivilegio')
        ->where('rol_privilegios.rolId', '=', $rol)
        ->get();

        $isUserAdmin = false;
        $roles = Rol::All();

        if($privilegios->contains('nombrePrivilegio', 'Administrar usuarios')){
            $isUserAdmin = true;
        }

        if($isUserAdmin){
            // $roles = DB::select('SELECT * FROM rols;');
            return view('usuario.create',compact('roles','isUserAdmin'), ['submit' => 'Registrar usuario'] );
        }else{
            return redirect()->back();
        }


        
        // return view('usuario.create', ['submit' => 'Registrar usuario']);
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
            'rol' => 'required',
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

        $userId = auth()->user()->id;

        $rol = auth()->User()->rolId;


        $privilegios = \DB::table('rol_privilegios')
        ->join('privilegios', 'rol_privilegios.privilegioId', '=', 'privilegios.id')
        ->select('privilegios.nombrePrivilegio')
        ->where('rol_privilegios.rolId', '=', $rol)
        ->get();

        $isUserAdmin = false;
        $canViewUsers = false;
        $isMe = false;

        if($userId == $id){
            $isMe = true;
        }

        if($privilegios->contains('nombrePrivilegio', 'Administrar usuarios')){
            $isUserAdmin = true;
        }
    
        if($privilegios->contains('nombrePrivilegio', 'Consultar usuarios')){
            $canViewUsers = true;
        }

        if($isUserAdmin || $canViewUsers || $isMe){
            
            
            return view('usuario.show', compact('usuario','empleado', 'isUserAdmin', 'canViewUsers','privilegios', 'isMe'));
        }else{
            return redirect()->back();
        }


        // return view('usuario.show', compact('usuario', 'empleado'));
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
        $userId = auth()->User()->id;
        $rol = auth()->User()->rolId;


        $privilegios = \DB::table('rol_privilegios')
        ->join('privilegios', 'rol_privilegios.privilegioId', '=', 'privilegios.id')
        ->select('privilegios.nombrePrivilegio')
        ->where('rol_privilegios.rolId', '=', $rol)
        ->get();

        $isUserAdmin = false;
        $isMe = false;


        if($userId == $id){
            $isMe = true;
        }

        if($privilegios->contains('nombrePrivilegio', 'Administrar usuarios')){
            $isUserAdmin = true;
        }

        $usuario = User::findOrFail($id);
        $empleado = Empleado::findOrFail($usuario->empleadoId);
        $roles = Rol::all();

        if($isUserAdmin || $isMe){
            
            
            return view('usuario.edit', compact('usuario','empleado','roles',  'isUserAdmin', 'isMe', 'privilegios'),['submit' => 'Guardar cambios']);
        }else{
            return redirect()->back();
        }

        
        // return view('usuario.edit', compact('usuario', 'empleado'), ['submit' => 'Guardar cambios']);
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
            'rol' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,gif',
        ]);

        $datosUsuario = $request->except(['_token','_method','num_documento']);
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


        $rol = auth()->User()->rolId;


        $privilegios = \DB::table('rol_privilegios')
        ->join('privilegios', 'rol_privilegios.privilegioId', '=', 'privilegios.id')
        ->select('privilegios.nombrePrivilegio')
        ->where('rol_privilegios.rolId', '=', $rol)
        ->get();

        $isUserAdmin = false;

        if($privilegios->contains('nombrePrivilegio', 'Administrar usuarios')){
            $isUserAdmin = true;
        }

        if($isUserAdmin ){
            
            
            $usuario = User::findOrFail($id);
        if(Storage::delete('public/'.$usuario->foto) && Storage::delete('public/'.$usuario->foto)){
            User::destroy($id);
        }

        return redirect('usuario');
        }else{
            return redirect()->back();
        }

        
    }

    public function pdf()
    {
        $usuarios = User::all();
        $usuarios = compact('usuarios');

        $pdf = PDF::loadView('usuario.pdf', $usuarios);
        return $pdf->setPaper('a3', 'landscape')->stream('Reporte usuarios');
    }
}

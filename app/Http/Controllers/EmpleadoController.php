<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\PDF as PDF;

class EmpleadoController extends Controller
{


    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */
    public function index(Request $request)
    {
        

        $rol = auth()->User()->rolId;


        $privilegios = \DB::table('rol_privilegios')
        ->join('privilegios', 'rol_privilegios.privilegioId', '=', 'privilegios.id')
        ->select('privilegios.nombrePrivilegio')
        ->where('rol_privilegios.rolId', '=', $rol)
        ->get();


        $showemple = false;
        $adminemple = false;
        $editemple = false;

        if($privilegios->contains('nombrePrivilegio', 'visualizar empleados')){
            $showemple = true;
        }

        if($privilegios->contains('nombrePrivilegio', 'administrar empleados')){
            $adminemple = true;
        }
        if($privilegios->contains('nombrePrivilegio', 'editar empleados')){
            $editemple = true;
        }

        if($showemple || $adminemple){
            if($request->has('search')){
                $empleados = Empleado::where('nombres', 'LIKE', '%'.$request->search.'%')
                ->orWhere('apellidos', 'LIKE', '%'.$request->search.'%')
                ->orWhere('num_documento', 'LIKE', '%'.$request->search.'%')
                ->orWhere('horario', 'LIKE', '%'.$request->search.'%')
                ->orWhere('cargo', 'LIKE', '%'.$request->search.'%')
                ->paginate(12);
            }else{
                $empleados = Empleado::paginate(12);
            }
            return view('empleado.index', compact('empleados', 'showemple', 'adminemple', 'privilegios', 'rol'));


        
    }else{
        return redirect()->back();
    }


        
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

        $adminemple = false;

        if($privilegios->contains('nombrePrivilegio', 'administrar empleados')){
            $adminemple = true;
        }

        if($adminemple){
            return view('empleado.create',compact('adminemple'), ['submit'=>'Registrar empleado']);

        }else{
            return redirect()->back();
        }


        
        
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

        $rol = auth()->User()->rolId;


        $privilegios = \DB::table('rol_privilegios')
        ->join('privilegios', 'rol_privilegios.privilegioId', '=', 'privilegios.id')
        ->select('privilegios.nombrePrivilegio')
        ->where('rol_privilegios.rolId', '=', $rol)
        ->get();

        $empleado = Empleado::findOrFail($id);
        $showemple = false;
        $adminemple = false;

        if($privilegios->contains('nombrePrivilegio', 'visualizar empleados')){
            $showemple = true;
        }

        if($privilegios->contains('nombrePrivilegio', 'administrar empleados')){
            $adminemple = true;
        }

        if($showemple || $adminemple){
            return view('empleado.show', compact('empleado','showemple','adminemple'));

        }else{
            return redirect()->back();
        }
        


        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = auth()->User()->rolId;


        $privilegios = \DB::table('rol_privilegios')
        ->join('privilegios', 'rol_privilegios.privilegioId', '=', 'privilegios.id')
        ->select('privilegios.nombrePrivilegio')
        ->where('rol_privilegios.rolId', '=', $rol)
        ->get();

        $adminemple = false;
        $editemple = false;
        
        $empleado = Empleado::findOrFail($id);

        if($privilegios->contains('nombrePrivilegio', 'editar empleados')){
            $editemple = true;
        }

        if($privilegios->contains('nombrePrivilegio', 'administrar empleados')){
            $adminemple = true;
        }

        if($adminemple || $editemple){
            return view('empleado.edit', compact('empleado','adminemple','editemple'), ['submit'=>'Guardar cambios']);
        }else{
            return redirect()->back();
        }



        
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
        $rol = auth()->User()->rolId;


        $privilegios = \DB::table('rol_privilegios')
        ->join('privilegios', 'rol_privilegios.privilegioId', '=', 'privilegios.id')
        ->select('privilegios.nombrePrivilegio')
        ->where('rol_privilegios.rolId', '=', $rol)
        ->get();

        $adminemple = false;

        if($privilegios->contains('nombrePrivilegio', 'administrar empleados')){
            $adminemple = true;
        }

        if($adminemple){
            $empleado = Empleado::findOrFail($id);
        if(Storage::delete('public/'.$empleado->foto) && Storage::delete('public/'.$empleado->contrato)){
            Empleado::destroy($id);
        }

        return redirect('empleado');

        }else{
            return redirect()->back();

        }



        
    }

    public function pdf()
    {
        $empleados = Empleado::all();
        $empleados = compact('empleados');

        $pdf = PDF::loadView('empleado.pdf', $empleados);
        return $pdf->setPaper('a3', 'landscape')->stream('Reporte Empleados');
    }
}

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

    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index(Request $request)
    {

        $rol = auth()->User()->rolId;


        $privilegios = \DB::table('rol_privilegios')
        ->join('privilegios', 'rol_privilegios.privilegioId', '=', 'privilegios.id')
        ->select('privilegios.nombrePrivilegio')
        ->where('rol_privilegios.rolId', '=', $rol)
        ->get();


        $habAdmin = false;
        $habConsultar = false;
        if($privilegios->contains('nombrePrivilegio', 'Administrar habitaciones')){
            $habAdmin = true;
        }

        if($privilegios->contains('nombrePrivilegio', 'visualizar habitaciones')){
            $habConsultar = true;
        }


        if($habAdmin || $habConsultar){
            if($request->has('search')){
                $habitaciones = Habitacion::where('num_habitacion', 'LIKE', '%'.$request->search.'%')
                ->orWhere('estado', 'LIKE', '%'.$request->search.'%')
                ->paginate(12);
            }else{
                $habitaciones = Habitacion::All();
            }
            return view('habitaciones.index', compact('habitaciones', 'habAdmin', 'habConsultar', 'privilegios', 'rol'));



        // $datos['habitaciones']=Habitacion::paginate(12);
        // return view('habitaciones.index', $datos);

        // return view('habitaciones.index');
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
        $habAdmin = false;

        if($privilegios->contains('nombrePrivilegio', 'Administrar habitaciones')){
            $habAdmin = true;
        }

        if($habAdmin ){
            return view('habitaciones.create', compact('habitaciones', 'habAdmin', 'habConsultar', 'privilegios', 'rol'), ['submit'=>'Crear habitacion']);
        // return view('habitaciones.create', ['submit'=>'Crear habitacion']);
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
        $request->validate([
            'num_habitacion' => 'required|regex:/^\d+$/',
            'num_personas' => 'required|regex:/^\d+$/',
            'descripcion' => 'required|regex:/^[A-Za-z0-9\s]+$/',
            'estado' => 'required',
            'inventario' => 'required|mimes:jpeg,png,jpg,gif',
            'foto' => 'required|mimes:jpeg,png,jpg,gif'
            
        ]);

        $datoshabitacion = $request->except('_token');
        // dd($datoshabitacion);

        if($request->hasFile('inventario')){
            $datoshabitacion['inventario']=$request->file('inventario')->store('habitaciones', 'public');
        }
        if($request->hasFile('foto')){
            $datoshabitacion['foto']=$request->file('foto')->store('habitaciones', 'public');
        }

        Habitacion::insert($datoshabitacion);
        return redirect('habitacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
        $habAdmin = false;

        $habConsultar = false;

        
        if($privilegios->contains('nombrePrivilegio', 'Administrar habitaciones')){
            $habAdmin = true;
        }

        if($privilegios->contains('nombrePrivilegio', 'visualizar habitaciones')){
            $habConsultar = true;
        }


        $habitacion = Habitacion::findOrFail($id);

        if($habAdmin || $habConsultar){

            if($habitacion->estado == 'libre'){
                return view('habitaciones.libre_show', compact('habitacion','habConsultar', 'habAdmin', 'privilegios', 'rol'));

            }elseif($habitacion->estado== 'ocupado'){
                return view('habitaciones.ocupada_show', compact('habitacion'));
            }

    }else{
        return redirect()->back();
    }

        

        //  return view('habitaciones.ocupada_show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
        $habAdmin = false;
        if($privilegios->contains('nombrePrivilegio', 'Administrar habitaciones')){
            $habAdmin = true;
        }
    
        $habitacion = Habitacion::findOrFail($id);

        if($habAdmin ){
            return view('habitaciones.edit', compact('habitacion', 'habAdmin', 'habConsultar', 'privilegios', 'rol'), ['submit'=>'Actualizar habitacion']);

        }else{
            return redirect()->back();
        }
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
        $request->validate([
            'num_habitacion' => 'regex:/^\d+$/',
            'num_personas' => 'regex:/^\d+$/',
            'descripcion' => 'regex:/^[A-Za-z0-9\s]+$/',
            'estado' => '',
            'inventario' => 'mimes:jpeg,png,jpg,gif',
            'foto' => 'mimes:jpeg,png,jpg,gif'
            
        ]);

        $datoshabitacion = $request->except('_token', '_method');

        if($request->hasFile('inventario')){
            $habitacion = Habitacion::findOrFail($id);
            Storage::delete('public/'.$habitacion->inventario);
            $datoshabitacion['inventario']=$request->file('inventario')->store('habitaciones', 'public');
        }
        if($request->hasFile('foto')){
            $habitacion = Habitacion::findOrFail($id);
            Storage::delete('public/'.$habitacion->foto);
            $datoshabitacion['foto']=$request->file('foto')->store('habitaciones', 'public');
        }

        Habitacion::where('id', '=' ,$id)->update($datoshabitacion);
        
        return redirect('habitacion');
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
        $habAdmin = false;
        if($privilegios->contains('nombrePrivilegio', 'Administrar habitaciones')){
            $habAdmin = true;
        }

        $habitacion = Habitacion::findOrFail($id);

        if($habAdmin ){
            if(Storage::delete('public/'.$habitacion->foto) && Storage::delete('public/'.$habitacion->inventario)){
                Habitacion::destroy($id);
            }

            return redirect('habitacion');
    }else{
        return redirect()->back();
    }
    }
}


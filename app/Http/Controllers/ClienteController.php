<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF as PDF;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rol = auth()->User()->rolId;


        $privilegios = \DB::table('rol_privilegios')
        ->join('privilegios', 'rol_privilegios.privilegioId', '=', 'privilegios.id')
        ->select('privilegios.nombrePrivilegio')
        ->where('rol_privilegios.rolId', '=', $rol)
        ->get();


        $showcli = false;
        $admincli = false;
        $editcli = false;

        if($privilegios->contains('nombrePrivilegio', 'visualizar clientes')){
            $showcli = true;
        }
        if($privilegios->contains('nombrePrivilegio', 'editar clientes')){
            $editcli = true;
        }

        if($privilegios->contains('nombrePrivilegio', 'administrar clientes')){
            $admincli = true;
        }

        if($showcli || $admincli){
            if($request->has('search')){
                $clientes = Cliente::where('nombres', 'LIKE', '%'.$request->search.'%')
                ->orWhere('apellidos', 'LIKE', '%'.$request->search.'%')
                ->orWhere('num_documento', 'LIKE', '%'.$request->search.'%')
                ->orWhere('procedencia', 'LIKE', '%'.$request->search.'%')
                ->paginate(12);
            }else{
                $clientes = Cliente::paginate(12);
            }
            return view('clientes.index', compact('clientes','editcli', 'admincli', 'showcli', 'privilegios', 'rol'));


        // $datos['clientes'] = Cliente::paginate(10);
        // return view('clientes.index', $datos);
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

        $admincli = false;

        if($privilegios->contains('nombrePrivilegio', 'administrar clientes')){
            $admincli = true;
        }
        if($admincli){

            return view('clientes.create',compact('admincli'),['submit' => 'Registrar cliente']);

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
        $rol = auth()->User()->rolId;


        $privilegios = \DB::table('rol_privilegios')
        ->join('privilegios', 'rol_privilegios.privilegioId', '=', 'privilegios.id')
        ->select('privilegios.nombrePrivilegio')
        ->where('rol_privilegios.rolId', '=', $rol)
        ->get();

        $showcli = false;
        $admincli = false;

        if($privilegios->contains('nombrePrivilegio', 'visualizar clientes')){
            $showcli = true;
        }

        if($privilegios->contains('nombrePrivilegio', 'administrar clientes')){
            $admincli = true;
        }

        if($showcli || $admincli){
            return redirect('');
        }else{
            return redirect()->back();
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
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


        $editcli = false;
        $admincli = false;

        if($privilegios->contains('nombrePrivilegio', 'editar clientes')){
            $editcli = true;
        }

        if($privilegios->contains('nombrePrivilegio', 'administrar clientes')){
            $admincli = true;
        }


        $cliente = Cliente::findOrFail($id);

        if($editcli || $admincli){
            return view('clientes.edit',compact('cliente','admincli', 'editcli'),['submit' => 'Guardar cambios']);
        }else{
            return redirect()->back();
        }

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
        $rol = auth()->User()->rolId;


        $privilegios = \DB::table('rol_privilegios')
        ->join('privilegios', 'rol_privilegios.privilegioId', '=', 'privilegios.id')
        ->select('privilegios.nombrePrivilegio')
        ->where('rol_privilegios.rolId', '=', $rol)
        ->get();


        $editcli = false;
        $admincli = false;

        if($privilegios->contains('nombrePrivilegio', 'editar clientes')){
            $editcli = true;
        }

        if($privilegios->contains('nombrePrivilegio', 'administrar clientes')){
            $admincli = true;
        }


        $cliente = Cliente::findOrFail($id);
        if($editcli || $admincli){
            Cliente::destroy($id);
        return redirect('/cliente');
        }else{
            return redirect()->back();
        }

    }

    public function pdf(Request $request)
    {



        if($request->has('search')){
            $clientes = Cliente::where('nombres', 'LIKE', '%'.$request->search.'%')
            ->orWhere('apellidos', 'LIKE', '%'.$request->search.'%')
            ->orWhere('num_documento', 'LIKE', '%'.$request->search.'%')
            ->orWhere('procedencia', 'LIKE', '%'.$request->search.'%')
            ->paginate(12);
        }else{
            $clientes = Cliente::all();
        }
        // $clientes = Cliente::all();
        $clientes = compact('clientes');

        $pdf = PDF::loadView('clientes.pdf', $clientes);
        return $pdf->setPaper('a3', 'landscape')->stream('Reporte clientes');
    }
}

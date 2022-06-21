<?php

namespace App\Http\Controllers;

use App\Models\Servicio;

use App\Http\Requests\StoreServicioRequest;
use App\Http\Requests\UpdateServicioRequest;
use App\Models\Cliente;
use App\Models\servicioCliente;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['servicios']=Servicio::paginate(12);
        return view('servicios.index', $datos);

        // return view('servicios.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $servicioNames = Servicio::all();
        return view('servicios.create',['submit' => 'Registrar'], compact('servicioNames'));
    }

    /**
     * Store a newly created resource in storage.
     *

     * @param  \App\Http\Requests\StoreServicioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        //
        $request->validate([
            'servicio' => ['required','in:2,3,4'],
            'num_documento' => 'required|regex:/^[a-zA-ZÀ-ÿ0-9\s\#\.\/\_\-]{7,200}$/',
            'pago' => 'required|numeric',
        ]);

        $datosServicio = $request->except(['_token', 'num_documento']);
        $documentoCliente = $request->num_documento;
        $clienteId = Cliente::where('num_documento','=',$documentoCliente)->get('id');
        $clienteId = $clienteId[0]->id;
        array_push($datosServicio, $clienteId);

        $valorTotal = Servicio::findOrFail($request->servicio);
        $valorTotal = $valorTotal->valor;
        array_push($datosServicio, $valorTotal);
        
        //? Insercion de usuario en base de datos *------------------------*
        
        servicioCliente::create([
                    'valorTotal' => $datosServicio['1'],
                    'clienteId' => $datosServicio['0'],
                    'servicioId' => $datosServicio['servicio'],
                    'pagosRecibidos' => $datosServicio['pago'],
                ]);
            
            
        // return response()->json($datosServicio);
        return redirect('/servicioCliente/'.$clienteId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $servicio = servicioCliente::findOrFail($id);
        $cliente = Cliente::findOrFail($servicio->clienteId);
        $servicioNombre = Servicio::findOrFail($servicio->servicioId);
        return view('servicios.show', compact('servicio','cliente','servicioNombre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $servicio = servicioCliente::findOrFail($id);
        $cliente = Cliente::findOrFail($servicio->clienteId);
        $servicioNames = Servicio::all();
        return view('servicios.edit',['submit' => 'Registrar'], compact('servicio','cliente','servicioNames'));
    }

    /**
     * Update the specified resource in storage.
     *

     * @param  \App\Http\Requests\UpdateServicioRequest  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'servicio' => ['required','in:2,3,4'],
            'num_documento' => 'required|regex:/^[a-zA-ZÀ-ÿ0-9\s\#\.\/\_\-]{7,200}$/',
            'pago' => 'required|numeric',
        ]);

        $datosServicio = $request->except(['_token', 'num_documento']);
        $documentoCliente = $request->num_documento;
        $clienteId = Cliente::where('num_documento','=',$documentoCliente)->get('id');
        $clienteId = $clienteId[0]->id;
        array_push($datosServicio, $clienteId);

        $valorTotal = Servicio::findOrFail($request->servicio);
        $valorTotal = $valorTotal->valor;
        array_push($datosServicio, $valorTotal);
        
        //? Insercion de usuario en base de datos *------------------------*
        
        servicioCliente::where('id','=',$id)->update([
                    'valorTotal' => $datosServicio['1'],
                    'clienteId' => $datosServicio['0'],
                    'servicioId' => $datosServicio['servicio'],
                    'pagosRecibidos' => $datosServicio['pago'],
                ]);
            
            
        // return response()->json($datosServicio);
        return redirect('/servicioCliente/'.$clienteId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //! AQUI HACE FALTA LA AUTENTICACION DE ROL PARA CONFIRMAR PRIVILEGIOS
        Servicio::destroy($id);
    }
}

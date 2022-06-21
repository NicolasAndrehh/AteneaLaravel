<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Habitacion;
use App\Models\Hospedaje;
use DateTime;
use Illuminate\Http\Request;

class HospedajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('servicios.Hospedaje.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $habitaciones = Habitacion::all();
        return view('servicios.hospedaje.create', ['submit' => 'Registrar hospedaje'], compact('habitaciones'));
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
            'num_documento' => 'required|regex:/^[a-zA-ZÀ-ÿ0-9\s\#\.\/\_\-]{7,200}$/',
            'habitacion' => ['required','integer'],
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'num_personas' => 'required|numeric',
            'pago' => 'required|numeric',
        ]);

        $datosHospedaje = $request->except(['_token', 'num_documento']);
        $documentoCliente = $request->num_documento;
        $clienteId = Cliente::where('num_documento','=',$documentoCliente)->get('id');
        $clienteId = $clienteId[0]->id;
        array_push($datosHospedaje, $clienteId);

        
        $contador = date_diff(new DateTime($request->fechaInicio), new DateTime($request->fechaFin));
        $differenceFormat = '%a';

        $dias = $contador->format($differenceFormat);
        array_push($datosHospedaje, $dias);

        //! AQUI SE DEBE TOMAR EL PRECIO DE LA HABITACION Y MULTIPLICAR POR LOS DIAS O ALGO ASI --------------- //
        $valorTotal = 30000 * $dias;
        array_push($datosHospedaje, $valorTotal);
        
        //? Insercion de usuario en base de datos *------------------------*
        
        Hospedaje::create([
                'fechaInicio' => $datosHospedaje['fechaInicio'],
                'fechaFin' => $datosHospedaje['fechaFin'],
                'numPersonas' => $datosHospedaje['num_personas'],
                'dias' => $datosHospedaje['1'],
                'valorTotal' => $datosHospedaje['2'],
                'pagosRecibidos' => $datosHospedaje['pago'],
                'clienteId' => $datosHospedaje['0'],
                'habitacionId' => $datosHospedaje['habitacion'],
            ]);
            
            
        // return response()->json($datosHospedaje);
        return redirect('/servicioCliente/'.$clienteId);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospedaje  $hospedaje
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $hospedaje = Hospedaje::findOrFail($id);
        $cliente = Cliente::findOrFail($hospedaje->clienteId);
        return view('servicios.hospedaje.show', compact('hospedaje','cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospedaje  $hospedaje
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $hospedaje = Hospedaje::findOrFail($id);
        $cliente = Cliente::findOrFail($hospedaje->clienteId);
        $habitaciones = Habitacion::all();
        return view('servicios.hospedaje.edit', compact('hospedaje', 'cliente','habitaciones'), ['submit' => 'Guardar cambios']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospedaje  $hospedaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'num_documento' => 'required|regex:/^[a-zA-ZÀ-ÿ0-9\s\#\.\/\_\-]{7,200}$/',
            'habitacion' => ['required','integer'],
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date',
            'num_personas' => 'required|numeric',
            'pago' => 'required|numeric',
        ]);

        $datosHospedaje = $request->except(['_token', 'num_documento']);
        $documentoCliente = $request->num_documento;
        $clienteId = Cliente::where('num_documento','=',$documentoCliente)->get('id');
        $clienteId = $clienteId[0]->id;
        array_push($datosHospedaje, $clienteId);

        
        $contador = date_diff(new DateTime($request->fechaInicio), new DateTime($request->fechaFin));
        $differenceFormat = '%a';

        $dias = $contador->format($differenceFormat);
        array_push($datosHospedaje, $dias);

        //! AQUI SE DEBE TOMAR EL PRECIO DE LA HABITACION Y MULTIPLICAR POR LOS DIAS O ALGO ASI --------------- //
        $valorTotal = 30000 * $dias;
        array_push($datosHospedaje, $valorTotal);
        
        //? Insercion de usuario en base de datos *------------------------*
        
        Hospedaje::where('id','=',$id)->update([
                'fechaInicio' => $datosHospedaje['fechaInicio'],
                'fechaFin' => $datosHospedaje['fechaFin'],
                'numPersonas' => $datosHospedaje['num_personas'],
                'dias' => $datosHospedaje['1'],
                'valorTotal' => $datosHospedaje['2'],
                'pagosRecibidos' => $datosHospedaje['pago'],
                'clienteId' => $datosHospedaje['0'],
                'habitacionId' => $datosHospedaje['habitacion'],
            ]);
            
            
        // return response()->json($datosHospedaje);
        return redirect('/servicioCliente/'.$clienteId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospedaje  $hospedaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospedaje $hospedaje)
    {
        //
    }
}

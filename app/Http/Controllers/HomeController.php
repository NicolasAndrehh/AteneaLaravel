<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Habitacion;
use App\Models\Cliente;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $libre = 0;
        $ocupado = 0;
        $fuera = 0;
        $limpieza = 0;
        $total = 0;
        $habitaciones=Habitacion::paginate(12);
        $clientes = Cliente::paginate(10);


        



        
        return view('home')->with(compact('habitaciones','clientes','libre','ocupado','fuera','limpieza','total'));
    }
}

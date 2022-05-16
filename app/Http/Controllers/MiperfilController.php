<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class MiperfilController extends Controller
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







        return view('home')->with(compact('habitaciones','clientes','libre','ocupado','fuera','limpieza','total'));
    }
}

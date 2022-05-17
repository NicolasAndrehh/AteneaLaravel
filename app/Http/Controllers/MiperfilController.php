<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\User;
// use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;


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
        // $este_usuario = Auth::User;




        $empleado = Empleado::findOrFail( Auth::user()->empleadoId);




        // return view('miperfil')->with(compact('este_usuario'));

        return view('miperfil',compact('empleado'));
    }



}

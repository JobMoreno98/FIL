<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $anio = date('Y');
        $eventos = Eventos::where('anio',$anio)->orderBy('fecha')->get();
        $fechas =  Eventos::select('fecha')->distinct()->get();
        return view('home',compact('eventos','fechas'));
    }
}
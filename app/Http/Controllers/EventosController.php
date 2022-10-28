<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Eventos;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    //

    public function index()
    {
        $eventos = Eventos::all();
        return view('eventos.index',compact('eventos'));
           
    }
    public function create()
    {
        $anio = date('Y');
        $agenda  = Agenda::where('anio', $anio)->count();

        if ($agenda > 0){
            return view('eventos.create', compact('anio'));
        } else{
            return redirect('agenda')->with([
                'error' => 'Antes de crear un evento debes dar de alta la agenda de este año',
            ]);
        }
    }

    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'area' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'fecha'=> 'required'
        ]);


        
        $evento = new Eventos;

        $evento->anio = date('Y');
        $evento->nombre = $request->nombre;
        $evento->participantes = $request->participantes;
        $evento->autor = $request->autor;
        $evento->coordinador = $request->coordinadores;
        $evento->organiza = $request->organiza;
        $evento->salon = $request->area;
        $evento->fecha = $request->fecha;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_fin = $request->hora_fin;

        $evento->save();
        
        return redirect()->route('inicio')->with([
            'message' => 'Se registro correctamente el evento',
        ]);
    }
}

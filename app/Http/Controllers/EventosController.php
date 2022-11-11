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
        return view('eventos.index', compact('eventos'));
    }
    public function create()
    {
        $anio = date('Y');
        $agenda  = Agenda::where('anio', $anio)->count();

        if ($agenda > 0) {
            return view('eventos.create', compact('anio'));
        } else {
            return redirect('agenda')->with([
                'error' => 'Antes de crear un evento debes dar de alta la agenda de este año',
            ]);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'area' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'fecha' => 'required',
            'categoria' => 'required'
        ]);



        $evento = new Eventos;

        $evento->anio = date('Y');
        $evento->nombre = $request->nombre;
        $evento->contacto = $request->contacto;
        $evento->categoria = $request->categoria;
        $evento->participantes = $request->participantes;
        $evento->autor = $request->autor;
        $evento->presentadores = $request->presentadores;
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
    public function eventos_delete(Eventos $evento)
    {
        $evento->delete();

        return redirect()->route('miagenda')->with([
            'message' => 'Se elimino correctamente el evento',
        ]);
    }
    public function edit(Eventos $evento)
    {
        return view('eventos.edit', compact('evento'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'area' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'fecha' => 'required',
            'categoria' => 'required'
        ]);
        Eventos::where('id',$id)->update([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'participantes' => $request->participantes,
            'autor' => $request->autor,
            'presentadores' => $request->presentadores,
            'coordinador' => $request->coordinadores,
            'organiza' => $request->organiza,
            'salon' => $request->area,
            'fecha' => $request->fecha,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' =>$request->hora_fin,
        ]);
        return redirect()->route('agenda.index')->with([
            'message' => 'Se edito correctamente el evento',
        ]);
    }
}

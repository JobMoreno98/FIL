<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Eventos;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(){

        return view('agenda.index');
    }

    public function show($id){
        $agenda = Agenda::where('id',$id);
    }
    
    public function agenda(){
        $agendas = Agenda::orderBy('id')->get();
        $anio = date('Y');
        return view('agenda.lista-agendas',compact('agendas','anio'));
    }

    public function create(){
        $anio = date('Y');
        return view('agenda.create',compact('anio'));
    }
    public function edit(Agenda $agenda){
        return view('agenda.edit',compact('agenda'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'anio' => 'required|integer|min:2022',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        $agenda = new Agenda;
        $agenda->nombre = $request->nombre;
        $agenda->fecha_inicio = $request->fecha_inicio;
        $agenda->fecha_fin = $request->fecha_fin;
        $agenda->save();

        return redirect()->route('home');
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'nombre' => 'required',
            'anio' => 'required|integer|min:2022',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);
        $agenda = Agenda::find($id);
        $agenda->nombre = $request->nombre;
        $agenda->anio = $request->anio;
        $agenda->fecha_inicio = $request->fecha_inicio;
        $agenda->fecha_fin = $request->fecha_fin;
        $agenda->update();
        return redirect()->route('lista-agendas');
    }

    public function eventos_dia(Request $request)
    {
        
        if ($request->ajax()){
            $anio = date('Y');
            $eventos = Eventos::where('anio',$anio)->where('fecha',$request->dia)->get();
            $fecha = str_replace('/', '-', $request->dia);
            $newDate = date('d-m-Y', strtotime($fecha));
            
            $dia = strftime('%d', strtotime($newDate));
            $mes = strftime('%B', strtotime($newDate));
            return view('agenda.contenido',compact('dia','eventos'))->render();
        }
    }
    public function destroy($id){
        return "destroy";
        return $id;
    }
}

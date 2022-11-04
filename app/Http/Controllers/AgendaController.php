<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Eventos;
use App\Models\Mi_agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    public function index(){

        return view('agenda.index');
    }

    public function show($id){
        $agenda = Agenda::where('id',$id);
        return $agenda;
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
            setlocale(LC_TIME, 'es_MX.utf8');
            $anio = date('Y');
            $eventos = Eventos::with('miagenda')->where('anio',$anio)->where('fecha',$request->dia)->orderBy('hora_inicio')->get();
            $fecha = str_replace('/', '-', $request->dia);
            $newDate = date('d-m-Y', strtotime($fecha));            
            $dia = strftime('%d', strtotime($newDate));
            $mes = strftime('%B', strtotime($newDate));
            return view('agenda.contenido',compact('dia','mes','eventos'))->render();
        }
    }

    public function add_agenda($id){
        Mi_agenda::create([
            'id_usuario' => Auth::user()->id,
            'id_evento' => $id,
        ]);
        return redirect()->route('home');
    }

    public function delete_agenda($id){
        $evento = Mi_agenda::find($id);
        $evento->delete();
        return redirect()->route('miagenda')->with([
            'message'=>'Se elimino corractamente'
        ]);
    }

    public function mi_agenda(){
        $agenda = Mi_agenda::with('user','evento')->where('id_usuario',Auth::user()->id)->get();
        return view('mi_agenda.agenda',compact('agenda'));
    }

    public function destroy($id){
        return "destroy";
        return $id;
    }
}

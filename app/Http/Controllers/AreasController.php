<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    public function index(){
        $areas = Areas::where('activo',1)->get();
        return view('areas.idex',compact('areas'));
    }
    public function create(){
        $anio = date('Y');
        return view('areas.create',compact('anio'));
    }
    public function store(){

    }
    public function update(){

    }

    public function destroy(){

    }
}

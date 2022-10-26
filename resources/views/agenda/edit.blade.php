@extends('layouts.app')

@section('content')
    @if (Auth::check() && Auth::user()->role == 'admin')
        <div class="container">
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row">
                <form action="{{ route('agenda.update',$agenda->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-4">
                            <label class="form-label" for="">Agenda Nombre</label>
                            <input name="nombre" class="form-control" type="text" placeholder="Nombre"
                                value="{{ $agenda->nombre }}">
                        </div>
                        <div class="col-sm-12 col-md-2">
                            <label class="form-label" for="anio">Año</label>
                            <input name="anio" class="form-control" id="anio" type="text" value="{{ $agenda->anio }}" readonly>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-2">
                        <div class="col-sm-12 col-md-3 m-1">
                            <label class="form-label" for="fecha_inicio">Fecha de Inicio</label>
                            <input name="fecha_inicio" class="form-control" id="fecha_inicio" type="date"
                                value="{{ $agenda->fecha_inicio }}">
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label class="form-label" for="fecha_fin">Fecha de Fin</label>
                            <input name="fecha_fin" id="fecha_fin" class="form-control" type="date" value="{{$agenda->fecha_fin }}">
                        </div>


                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col-sm-12 col-md-2">
                            <button type="submit" class="w-100 btn btn-outline-success"> Guardar</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    @endif


@endsection

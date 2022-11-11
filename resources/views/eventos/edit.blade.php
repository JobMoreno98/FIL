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
            <div class="row justify-content-center">
                <form action="{{ route('eventos.update', $evento->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-7 mb-3">
                            <label class="form-label" for="">Nombre</label>
                            <input name="nombre" class="form-control" type="text" placeholder="Nombre"
                                value="{{ $evento->nombre }}">
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="row justify-content-around">
                                <div class="col-md-8">
                                    <label class="form-label" for="coordinadores">Coordinadores</label>
                                    <textarea class="form-control" placeholder="Coordinadores" name="coordinadores" id="coordinadores">{{  $evento->coordinadores }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="contacto" class="form-label">Contacto Coordinador</label>
                                    <input type="text" name="contacto" id="contacto" class="form-control"
                                        placeholder="Contacto" value="{{ $evento->contacto }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <label class="form-label" for="participantes">Participantes</label>
                            <textarea class="form-control" placeholder="Participantes" name="participantes" id="descripcion">{{ $evento->participantes }}</textarea>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <label class="form-label" for="autor">Autor</label>
                            <textarea class="form-control" placeholder="Autor" name="autor" id="autor">{{ $evento->autor }}</textarea>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <label class="form-label" for="presentadores">Presentadores</label>
                            <textarea class="form-control" placeholder="Presentadores" name="presentadores" id="presentadores">{{ $evento->presentadores }}</textarea>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <label for="categoria" class="form-label">Selecciona una categoria</label>
                            <select class="form-control" name="categoria" id="categoria">
                                <option disabled selected>Selecciona una opción</option>
                                <option {{ $evento->categoria == 'FIL Pensamiento' ? 'selected' : '' }}
                                    value="FIL Pensamiento">
                                    FIL Pensamiento</option>
                                <option {{ $evento->categoria == 'Presentación de Libros' ? 'selected' : '' }}
                                    value="Presentación de Libros">Presentación de Libros</option>
                                <option {{ $evento->categoria == 'FIL en CUCSH' ? 'selected' : '' }} value="FIL en CUCSH">
                                    FIL en
                                    CUCSH</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-7">
                            <label class="form-label" for="organiza">Organiza</label>
                            <input class="form-control" type="text" name="organiza" id="organiza"
                                value="{{ $evento->organiza }}">
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <label class="form-label" for="area">Salón</label>
                            <input class="form-control" type="text" name="area" id="area"
                                value="{{ $evento->salon }}">
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-3">
                            <label class="form-label" for="hora_inicio">Hora Inicio</label>
                            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required
                                value="{{ $evento->hora_inicio }}">
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label class="form-label" for="hora_fin">Hora Fin</label>
                            <input type="time" class="form-control" id="hora_fin" name="hora_fin" required
                                value="{{ $evento->hora_fin }}">
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label class="form-label" for="">Fecha</label>
                            <input name="fecha" class="form-control" type="date" value="{{ $evento->fecha }}">
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

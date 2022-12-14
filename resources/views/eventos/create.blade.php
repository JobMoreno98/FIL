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
                <form action="{{ route('eventos.store') }}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-7 mb-3">
                            <label class="form-label" for="">Nombre</label>
                            <input name="nombre" class="form-control" type="text" placeholder="Nombre"
                                value="{{ old('nombre') }}">
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="row justify-content-around">
                                <div class="col-md-8">
                                    <label class="form-label" for="coordinadores">Coordinadores</label>
                                    <textarea class="form-control" placeholder="Coordinadores" name="coordinadores" id="coordinadores">{{ old('coordinadores') }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="contacto" class="form-label">Contacto Coordinador</label>
                                    <input type="text" name="contacto" id="contacto" class="form-control" placeholder="Contacto" value="{{old('contacto')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <label class="form-label" for="participantes">Participantes</label>
                            <textarea class="form-control" placeholder="Participantes" name="participantes" id="descripcion">{{ old('participantes') }}</textarea>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <label class="form-label" for="autor">Autor</label>
                            <textarea class="form-control" placeholder="Autor" name="autor" id="autor">{{ old('autor') }}</textarea>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <label class="form-label" for="presentadores">Presentadores</label>
                            <textarea class="form-control" placeholder="Presentadores" name="presentadores" id="presentadores">{{ old('presentadores') }}</textarea>
                        </div>

                        <div class="col-sm-12 col-md-7">
                            <label for="categoria" class="form-label">Selecciona una categoria</label>
                            <select class="form-control" name="categoria" id="categoria">
                                <option disabled selected>Selecciona una opci??n</option>
                                <option value="FIL Pensamiento">FIL Pensamiento</option>
                                <option value="Presentaci??n de Libros">Presentaci??n de Libros</option>
                                <option value="FIL en CUCSH">FIL en CUCSH</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-7">
                            <label class="form-label" for="organiza">Organiza</label>
                            <input class="form-control" type="text" name="organiza" id="organiza"
                                value="{{ old('organiza') }}">
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <label class="form-label" for="area">Sal??n</label>
                            <input class="form-control" type="text" name="area" id="area"
                                value="{{ old('area') }}">
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-3">
                            <label class="form-label" for="hora_inicio">Hora Inicio</label>
                            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required
                                value="{{ old('hora_inicio') }}">
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label class="form-label" for="hora_fin">Hora Fin</label>
                            <input type="time" class="form-control" id="hora_fin" name="hora_fin" required
                                value="{{ old('hora_fin') }}">
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <label class="form-label" for="">Fecha</label>
                            <input name="fecha" class="form-control" type="date" value="{{ old('fecha') }}">
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

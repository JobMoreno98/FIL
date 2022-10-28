@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <td>Nombre</td>
                            <td>Organiza</td>
                            <td>Salón</td>
                            <td>Fecha</td>
                            <td>Hora Inicio</td>
                            <td>Hora Fin</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventos as $item)
                            <tr>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->organiza }}</td>
                                <td>{{ $item->salon }}</td>
                                <td>{{ $item->fecha }}</td>
                                <td>{{ $item->hora_inicio }}</td>
                                <td>{{ $item->hora_fin }}</td>
                                <td><a href="{{route('eventos.edit',$item->id)}}" class="btn btn-success btn-sm w-100 m-1">Editar</a>
                                    <a href="{{route('eventos.delete',$item->id)}}" class="btn btn-danger btn-sm w-100 m-1">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

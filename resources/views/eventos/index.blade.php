@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="table-responsive">
                <table class="table" id="tabla">
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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/r-2.3.0/sb-1.3.4/sp-2.0.2/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/r-2.3.0/sb-1.3.4/sp-2.0.2/datatables.min.js"></script>

<script>
    $(document).ready( function () {
    $('#tabla').DataTable();
} );
</script>
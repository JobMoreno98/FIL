@extends('layouts.app')

@section('content')
    @if (Auth::check() && Auth::user()->role == 'admin')

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-8 mb-2">
                    <div class="card">
                        <div class="card-header">Agendas</div>
                        <div class="card-body">
                            <table class="table table-striped dt-responsive nowrap" style="width:100%" id="agendas">
                                <thead>
                                    <tr class="text-center">
                                        <td>#</td>
                                        <td>Nombre</td>
                                        <td>Año</td>
                                        <td>Fecha Inicio</td>
                                        <td>Fecha Fin</td>
                                        <td>Acciones</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agendas as $agenda)
                                        <tr class="text-center">
                                            <td>{{ $agenda->id }}</td>
                                            <td>{{ $agenda->nombre }}</td>
                                            <td>{{ $agenda->anio }}</td>
                                            <td>{{ $agenda->fecha_inicio }}</td>
                                            <td>{{ $agenda->fecha_fin }}</td>
                                            @if ($anio == $agenda->anio)
                                                <td>
                                                    <a class="btn btn-success w-40"
                                                        href="{{ route('agenda.edit', $agenda->id) }}"><i class="far fa-edit"></i></a>
                                                    <a class="btn btn-danger w-40"
                                                        href="{{ route('agenda.destroy', $agenda) }}"><i class="fas fa-trash"></i></a>
                                                </td>
                                            @else
                                                <td>
                                                    <h6 class="text-muted"> La agenda ya cerro</h6>
                                                </td>
                                            @endif

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script type="text/javascript">
        $(document).ready(function() {
            $('#agendas').DataTable();
        });
    </script>
    
@endsection

@extends('layouts.app')

@section('content')
    @php
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'spanish');
        $dia_actual = date('Y-m-d');
    @endphp
    <div class="container" onload="logKey({{ $dia_actual }})">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <div class="row justify-content-center">
                        @foreach ($fechas as $item)
                            <td class="col text-center border shadow-sm m-1 p-1" onclick="logKey('{{ $item->fecha }}')">
                                @php
                                    $fecha = str_replace('/', '-', $item->fecha);
                                    $newDate = date('d-m-Y', strtotime($fecha));
                                    $dia = strftime('%d', strtotime($newDate));
                                    $mes = strftime('%B', strtotime($newDate));
                                @endphp
                                {{ $dia }}<br> {{ strtoupper($mes) }}
                            </td>
                        @endforeach
                </tr>
            </table>
        </div>

        <hr>
    </div>
    <div class="container">
        <div class="row" id="contenidos">

        </div>
    </div>
    <!-- Modal con la informacion-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="titulo"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Organiza: <span id="organiza"></span></p>
                    <p>Coordinador: <span id="coordinador"></span></p>

                    <p>Salón: <span id="salon"></span></p>
                    <p>Participantes
                    <ul id="participantes">

                    </ul>
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6">
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let fecha = "<?php echo $dia_actual; ?>";
            let fechas = @json($fechas);
            fechas.forEach(element => {
                if (element.fecha === fecha) {
                    logKey(fecha);
                }
            });
        });

        function logKey(fecha) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('buscar.dia') }}",
                method: 'GET',
                data: {
                    dia: fecha
                }
            }).done(function(data) {
                $('#contenidos').html(data);
            });
        }

        function modal(element) {
            let part = element.participantes.split(',');
            document.getElementById('titulo').textContent = element.nombre;
            document.getElementById('organiza').textContent = element.organiza;
            document.getElementById('coordinador').textContent = element.coordinador;
            document.getElementById('salon').textContent = element.salon;

            let participantes = document.getElementById('participantes');
            participantes.innerHTML = "";
            part.forEach(item => {
                participantes.innerHTML += "<li> " + item + "</li>";
            });

            document.getElementById('organiza').textContent = element.organiza;
        }
    </script>
    <script>
        function no_login() {
            $.alert({
                title: 'Iniciar sesión',
                content: 'Para añadir a <b> Mi Agenda </b> debes de iniciar sesión primero',
            });
        }
    </script>
@endsection

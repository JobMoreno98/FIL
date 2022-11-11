@extends('layouts.app')

@section('content')
    @php
        date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_MX.utf8');
        $dia_actual = date('Y-m-d');
    @endphp
    <div class="container" onload="logKey({{ $dia_actual }})">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <div class="row justify-content-center">
                        @foreach ($fechas as $item)
                            <td class="col text-center border shadow-sm m-1 p-3" id="{{ $item->fecha }}"
                                onclick="logKey('{{ $item->fecha }}')" data-swipe-ignore="true">
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
    <div class="container" data-swipe-ignore="true">
        <div class="row" id="contenidos" data-swipe-ignore="true">

        </div>
        <div class="row" id="fuera_fecha" style="display: none">
            <div class="col-sm-12">
                <h4 class="text-center">Te encuentras fuera de los días de FIL favor de seleccionar un día.</h4>
            </div>
        </div>
    </div>

    <!-- Modal con la informacion-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="titulo"></h1>
                </div>
                <div class="modal-body">
                    <div class="Pensamiento" style="display: block">
                        <p class="fs-bold    ">Organiza: <span id="organiza"></span></p>
                        <p>Coordinador: <span id="coordinador"></span>
                            @if (Auth::check())
                                Contacto: <span id="contacto_coordinador"></span>
                            @endif
                        </p>
                    </div>
                    <div id="Libro" style="display: block">
                        <p>Autor: <span id="autor"></span></p>
                        <p>Presentadores: <span id="presentadores"></span></p>
                    </div>
                    <p>Categoria: <span id="categoria"></span></p>
                    <p>Salón: <span id="salon"></span></p>
                    <div class="Pensamiento">
                        <p>Participantes
                        <ul id="participantes">

                        </ul>
                    </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var fecha_seleccionada = new Date();
        var td_anterior;
        $(document).ready(function() {
            let fecha = "<?php echo $dia_actual; ?>";
            let fechas = @json($fechas);
            let flag = 0;
            fechas.forEach(element => {
                if (element.fecha === fecha) {
                    logKey(fecha);
                    flag = 1;
                }
            });
            if (flag == 0) {
                document.getElementById('fuera_fecha').style.display = 'block';
            }
        });

        function logKey(fecha) {
            fecha_seleccionada = fecha;
            if (document.getElementById('fuera_fecha').style.display === 'block') {
                document.getElementById('fuera_fecha').style.display = 'none';
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (td_anterior !== undefined) {
                td_anterior.classList.remove('bg-primary');
                td_anterior.classList.remove('text-white');
            }

            let td = document.getElementById(fecha)
            td.classList.add("bg-primary");
            td.classList.add("text-white");
            td_anterior = td;
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
            if (element.hasOwnProperty('participantes') && element.participantes != null) {
                let part = element.participantes.split(',');
                let participantes = document.getElementById('participantes');
                participantes.innerHTML = "";
                part.forEach(item => {
                    participantes.innerHTML += "<li> " + item + "</li>";
                });
            }
            document.getElementById('autor').textContent = element.autor;
            document.getElementById('categoria').textContent = element.categoria;

            let pensamiento = document.getElementsByClassName('Pensamiento');
            if (element.categoria == 'Presentación de Libros') {

                for (let index = 0; index < pensamiento.length; index++) {
                    pensamiento[index].style.display = 'none';
                }
                document.getElementById('Libro').style.display = 'block';

            } else {

                for (let index = 0; index < pensamiento.length; index++) {
                    pensamiento[index].style.display = 'block';
                }
                document.getElementById('Libro').style.display = 'none';

            }
            let login = "{{ Auth::check() }}";
            if(login != ''){
                document.getElementById('contacto_coordinador').textContent = element.contacto;
            }
            console.log(login);
            document.getElementById('titulo').textContent = element.nombre;
            document.getElementById('organiza').textContent = element.organiza;
            document.getElementById('coordinador').textContent = element.coordinador;
            document.getElementById('salon').textContent = element.salon;
            document.getElementById('organiza').textContent = element.organiza;

        }

        function no_login() {
            $.alert({
                title: 'Iniciar sesión',
                content: 'Para añadir a <b> Mi Agenda </b> debes de <a href="{{ route('login') }}" >Iniciar Sesión</a> primero ',
            });
        }
    </script>

    <script>
        window.onload = function() {
            document.addEventListener('swiped-left', function(e) {
                console.log('derecha - izquerda');
                console.log(Date(fecha_seleccionada) < Date('2022-12-04'));
                if (new Date(fecha_seleccionada) < new Date('2022-12-04')) {
                    console.log('derecha - izquerda')
                    var fecha = new Date(fecha_seleccionada);
                    const dias = 2; // Número de días a agregar
                    fecha.setDate(fecha.getDate() + dias);
                    logKey(fecha.toLocaleDateString("fr-CA"))
                    console.log(fecha.toLocaleDateString("fr-CA"));
                }

            });

            document.addEventListener('swiped-right', function(e) {
                console.log('izquierda - derecha');
                console.log(new Date(fecha_seleccionada) + " > " + new Date('2022-11-26'));
                if (new Date(fecha_seleccionada) > new Date('2022-11-26')) {
                    var fecha = new Date(fecha_seleccionada);
                    fecha.setDate(fecha.getDate());
                    logKey(fecha.toLocaleDateString("fr-CA"))
                    console.log(fecha.toLocaleDateString("fr-CA"));
                }
            });
        }
    </script>
@endsection

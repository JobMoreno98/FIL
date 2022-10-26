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
                        @foreach ($eventos as $item => $value)
                            <td class="col text-center border shadow-sm m-1 p-1" onclick="logKey('{{ $value->fecha }}')">
                                @php
                                    $fecha = str_replace('/', '-', $value->fecha);
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


    <div class="row mt-3" id="texto" style="display: block">
        <div class="col-sm-12">


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
                if(element.fecha === fecha){
                    logKey(fecha);
                }
            });
            
        });

        function logKey(fecha) {
            console.log(fecha);
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
    </script>
@endsection

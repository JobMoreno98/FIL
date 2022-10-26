<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Agenda FIL</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }} " rel="stylesheet">
    <style>
        .day {
            background: #161223;
            letter-spacing: 0.35em;
            padding: 1em;
            text-align: center;
            color: #fff;
        }

        .big {
            transform: scale(1.2);
        }
    </style>
</head>

<body >
    @php
        $dias = [26 => ['SÁbado', 'Noviembre'], 27 => ['Domingo', 'Noviembre'], 28 => ['Lunes', 'Noviembre'], 29 => ['Martes', 'Noviembre'], 30 => ['MiÉrcoles', 'Noviembre'], 1 => ['Jueves', 'Diciembre'], 2 => ['Viernes', 'Diciembre'], 3 => ['SÁbado', 'Diciembre'], 4 => ['Domingo', 'Diciembre']];
    @endphp
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-sm-12 mb-2">
                <img src="{{asset('img/cab_fil_FIL22.jpg')}}" alt="imagen FIL" class="img-fluid d-none d-sm-block d-print-inline" >
                <img src="{{asset('img/cab_fil_FIL22_movil.jpg')}}" class="img-fluid d-sm-none d-print-none" alt="imagen FIL">
            </div>
        </div>
        <div class="row m-1">
            <div class="col-sm-12">
                <form class="row justify-content-center">
                    <div class="col-sm-12 col-md-8">
                        <label for="inputPassword2" class="visually-hidden">Introduce una palabra para buscar</label>
                        <input type="password" class="form-control" id="inputPassword2"
                            placeholder="Introduce una palabra para buscar">
                    </div>
                    <div class="col-sm-12 col-md-3 m-1">
                        <button type="submit" class="btn btn-primary w-100">Buscar</button>
                    </div>
                </form>
            </div>

        </div>
        <hr>
        <div class="row justify-content-center">
            @foreach ($dias as $item => $value)
                <div class="col-sm-12 col-md-3 ">
                    <a href="{{route('buscar.dia',$item)}}" class="text-decoration-none big">
                        <div class="card w-80 m-1 shadow">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item day">{{ strtoupper($value[0]) }}</li>
                                <li class="list-group-item text-center pt-5 pb-5">
                                    <h4>{{ $value[1] }} <br /> {{ $item }}</h4>

                                </li>
                                <li class="list-group-item day">2022</li>
                            </ul>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>

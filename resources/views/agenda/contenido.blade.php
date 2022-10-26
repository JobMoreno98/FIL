<h1 class="text-center">Eventos del día {{ $dia }}</h1>
<div class="container">
    <div class="row justify-content-center">
        @foreach ($eventos as $item)
            <div class="col-sm-5 col">
                <a href="" class="text-decoration-none">
                    <div class="card mb-3 shadow w-100">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card-body text-dark">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text text-start fs-5">{{ $item->nombre }}</p>
                                    <p
                                        class="card-text text-dark {{ is_null($item->participantes) ? 'd-none' : 'd-block' }}">
                                        <b>Participantes:</b> {{ $item->participantes }}</p>
                                    <hr>
                                    <p><small><b>Fecha:</b> {{ $item->fecha }}</small> 
                                        <br> 
                                        <small><b>Hora Inicio: </b> {{ $item->hora_inicio }} <b>Hora Fin:</b> {{ $item->hora_fin }} </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

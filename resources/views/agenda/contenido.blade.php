<h1 class="text-center">Eventos del día {{ $dia }}</h1>
<div class="container">
    <div class="row justify-content-center">
        @foreach ($eventos as $item)
            <div class="col-sm-4 m-1">
                <a onclick="modal({{ $item }})" class="text-decoration-none" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <div class="card mb-3 shadow w-100 h-100">
                        <div class="row justify-content-center h-100">
                            <div class="col-md-12">
                                <div class="card-body text-dark ">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text text-start fs-5">{{ $item->nombre }}</p>
                                    <p class="card-text text-dark">
                                        <b>Organiza:</b> {{ $item->organiza }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-11">
                                <div class="card-footer mt-auto text-muted border-0">
                                    @if (Auth::check())
                                        @if (isset($item->miagenda[0]) && $item->miagenda[0]->id_usuario == Auth::user()->id)                                            
                                            <p class="text-end">
                                                <a href="{{ route('elimninar-agenda', $item->miagenda[0]->id) }}"
                                                    class="text-end text-danger"><i class="fas fa-plus"></i> Eliminar de
                                                    la agenda</a>
                                            </p>
                                        @else
                                            <p class="text-end">
                                                <a href="{{ route('añadir-agenda', $item->id) }}" class="text-end"><i
                                                        class="fas fa-plus"></i> Añadir Mi agenda</a>
                                            </p>
                                        @endif
                                    @else
                                        <p class="text-end">
                                            <a onclick="no_login()" @disabled(true)
                                                class="text-end text-muted"><i class="fas fa-plus"></i> Añadir Mi
                                                agenda</a>
                                        </p>
                                    @endif
                                    <p class="text-end align-middle">
                                        <small class="text-dark">
                                            <b>Hora Inicio: </b> {{ $item->hora_inicio }}
                                            <b>Hora Fin: </b> {{ $item->hora_fin }}
                                        </small>
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

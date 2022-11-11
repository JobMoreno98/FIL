<h2 class="text-center" data-swipe-ignore="true">Eventos del día {{ $semana }} <span
        id="dia">{{ $dia }}</span> de <span id="mes">{{ ucfirst($mes) }} </span></h2>

<div class="container" data-swipe-ignore="true">
    <div class="row justify-content-center" data-swipe-threshold="100">
        @foreach ($eventos as $item)
            <div class="col-sm-12">
                <div class="row">
                    <div class="card mb-3 shadow-lg w-100 h-100" >
                        <div class="row justify-content-center h-100">
                            @if ($item->created_at != $item->updated_at && $item->updated_at->format('Y-m-d') <= $item->fecha)
                                <div class="col-sm-12 mt-1">
                                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                                        <strong >El evento ha sido actualizado</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
                                </div>
                            @endif
                            <div class="col-md-8 ">
                                <div class="card-body text-dark " onclick="modal({{ $item }})"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text text-start fs-5">{{ $item->nombre }}</p>
                                    <p class="card-text text-dark">
                                        <b>Salón:</b> {{ $item->salon }} <br>
                                        <b>Categoria :</b> {{ $item->categoria }}
                                        @if (Auth::check() && $item->coordinador != null)
                                            <span class="d-none d-md-block">
                                                <b>Coordinadores: </b> {{ $item->coordinador }}
                                                <b>Contacto: </b> {{ $item->contacto }}
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 m-md-auto">
                                <div class="card-footer mt-auto text-muted border-0">
                                    @if (Auth::check())
                                        @if (isset($item->miagenda[0]) && $item->miagenda[0]->id_usuario == Auth::user()->id)
                                            <p class="text-end">
                                                <a href="{{ route('elimninar-agenda', $item->miagenda[0]->id) }}"
                                                    class="text-end text-danger"><i class="fas fa-plus"></i>
                                                    Eliminar de
                                                    la agenda</a>
                                            </p>
                                        @else
                                            <p class="text-end">
                                                <a href="{{ route('añadir-agenda', $item->id) }}"
                                                    class="text-end border-bottom p-2"><i class="fas fa-plus"></i>
                                                    Añadir Mi agenda</a>
                                            </p>
                                        @endif
                                    @else
                                        <p class="text-end">
                                            <a onclick="no_login()" @disabled(true)
                                                class="text-end text-muted  border-bottom p-2"><i
                                                    class="fas fa-plus"></i> Añadir Mi
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
                </div>
            </div>
        @endforeach
    </div>
</div>

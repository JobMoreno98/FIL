@extends('layouts.app')

@section('content')
    @if (Auth::check() && Auth::user()->role == 'admin')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-8">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                    @endif
                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                @endif
                </div>

            </div>
            <div class="row justify-content-center ">
                <div class="col-md-8 mb-2">
                    <div class="card">
                        <div class="card-header">Agendas</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <a class="btn btn-primary w-40" href="{{ route('lista-agendas') }}">Ver Agendas</a>
                            <a class="btn btn-success w-40" href="{{ route('agenda.create') }}">Crear Nueva Agenda</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mb-2">
                    <div class="card">
                        <div class="card-header">Eventos</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <a class="btn btn-primary w-40" href="{{ route('eventos.index') }}">Ver Eventos</a>
                            <a class="btn btn-success" href="{{ route('eventos.create') }}">Crear nuevo eventos</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Áreas</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <a class="btn btn-primary w-40" href="{{ route('areas.index') }}">Ver Áreas</a>
                            <a class="btn btn-success" href="{{ route('areas.create') }}">Crear nuevas áreas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

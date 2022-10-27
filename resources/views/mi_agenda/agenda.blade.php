@extends('layouts.app')

@section('content')
@if (isset(session('message')))
    {{session('message')}}
@endif
    <div class="container">
        <div class="row">
            @foreach ($agenda as $item)
            <div class="col-sm-4 m-1">
                <a onclick="modal({{ $item }})" class="text-decoration-none" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <div class="card mb-3 shadow w-100 h-100">
                        <div class="row justify-content-center h-100">
                            <div class="col-md-12">
                                <div class="card-body text-dark ">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text text-start fs-5">{{ $item->evento->nombre }}</p>
                                    <p class="card-text text-dark">
                                        <b>Organiza:</b> {{ $item->evento->organiza }}
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-11">
                                <div class="card-footer text-muted border-0">
                                    <p class="text-end">
                                        <a href="{{route('elimninar-agenda',$item->id)}}" class="text-end text-danger"><i class="fas fa-plus"></i> Eliminar de la agenda</a>
                                    </p>
                                    <p class="text-end align-middle">
                                        <small class="text-dark">
                                            <b>Hora Inicio: </b> {{ $item->evento->hora_inicio }} 
                                            <b>Hora Fin: </b> {{ $item->evento->hora_fin }} 
                                            
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
@endsection

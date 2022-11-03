@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <h1 class="text-center">FIL Pensamiento</h1>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-3 text-center m-1">
                <div class="card shadow h-100">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/agenda.svg') }}" class="mx-auto card-img-top pt-2 img-fluid w-50"
                            alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Agenda</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 text-center m-1">
                <div class="card shadow h-100">
                    <a href="{{ route('ponentes') }}" class="justify-content-center">
                        <img src="{{ asset('img/ponente.svg') }}" class="mx-auto card-img-top pt-2 w-50 content-center"
                            alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Ponentes</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 text-center m-1">
                <div class="card shadow h-100">
                    <a href="{{ route('miagenda') }}">
                        <img src="{{ asset('img/calendar.svg') }}" class="mx-auto card-img-top pt-2 img-fluid w-50"
                            alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Mi Agenda</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

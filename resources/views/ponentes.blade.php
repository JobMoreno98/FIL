@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@endsection

@section('content')
    <div class="container mt-3">
        <div class="row text-center">
            <div class="col-xl-3 col-sm-6 mb-5 mx-auto">
                <a href="">
                    <div class="bg-white rounded shadow-sm py-5 px-4">
                        <img
                        src="https://bootstrapious.com/i/snippets/sn-team/teacher-4.jpg" alt="" width="150"
                        class="mx-auto img-fluid rounded-circle mb-3 img-thumbnail shadow-sm  place-content-center">
                    <h5 class="mb-0">Manuella Nevoresky</h5><span class="small text-uppercase text-muted">CEO -
                        Founder</span>
                </div>
                </a>

            </div>
        </div>
    </div>
@endsection

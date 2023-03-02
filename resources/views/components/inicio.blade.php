@extends('layouts.index')
@section('titulo')
    Buscar
@endsection
@section('contenido')
    {{-- Generando el token de validaciones para el envio --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="my-2">
            <h2 style="text-shadow: 0px 0px 2px #717171;">Determinaciónes de crédito fiscal</h2>
            <h4 style="text-shadow: 0px 0px 2px #717171;"><img
                    src="https://img.icons8.com/color/40/000000/signing-a-document.png" /> Tijuana</h4>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">
                <h5 style="text-shadow: 0px 0px 2px #717171;">Generar formato de determinación</h5>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <div class="d-flex flex-row">
                        <div class="col-md-6">
                            <img
                                src="https://img.icons8.com/external-sbts2018-outline-color-sbts2018/40/000000/external-search-ecommerce-basic-1-sbts2018-outline-color-sbts2018.png" />
                            Buscar cuenta predial o propietario
                        </div>
                        <div class="col-md-4">
                            <form action="#" id="search-form">
                                <div class="justify-content-center justify-content-md-center">
                                    <div class="input-group justify-content-center">
                                        <input type="search" maxlength="10" class="form-control border-secondary"
                                            placeholder="Buscar cuenta predial o propietario" id="mysearch" required
                                            autofocus />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </blockquote>
            </div>
            {{-- Contenedor de las consultas por jquery --}}
            <div id="showlist"></div>
        </div>
    </div>
@endsection
@section('js')
    {{-- Script de la ruta y del buscador --}}
    <script src="{{ asset('js/search.js') }}" type="module"></script>
    <script src="{{ asset('js/rutas.js') }}"></script>
@endsection

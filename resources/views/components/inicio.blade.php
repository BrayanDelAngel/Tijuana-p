@extends('layouts.index')
@section('titulo')
    Buscar
@endsection
@section('contenido')
    {{-- Generando el token de validaciones para el envio --}}
    @if (session('error_empty'))
        <script src="{{ asset('js/sweetAlert/error_empty.js') }}"></script>
    @endif
    @if (session('pdf'))
        <script>
            (async () => {
                 await Swal.fire({ 
                    title: '{{ session('pdf') }}',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Obtener',
                    html: 
                    '<input type="hidden" value="{{ Session::get('determinacion') }}" id="determinacion" name="determinacion" class="swal2-input">' +
                    '<input type="hidden" value="{{ Session::get('requerimiento') }}" id="requerimiento" name="requerimiento" class="swal2-input">' +
                    '<input type="hidden" value="{{ Session::get('mandamiento') }}" id="mandamiento" name="mandamiento" class="swal2-input">' +
                        `
                        <select class="form-select form-select-lg mb-3" id="pdf" data-style="btn-warning" data-live-search="true" >
                        <option value="0"  selected>Seleccione un pdf</option>
                        <option value="1">Determinación</option>
                            
                        @if (Session::get('requerimiento') !=0)
                            <option value="2">Requerimiento</option>
                        @endif
                        @if (Session::get('mandamiento')!=0)
                            <option value="3">Mandamiento</option>
                        @endif
                        </select>
                        `,
                    preConfirm: () => {
                        return [
                            document.getElementById('determinacion').value,
                            document.getElementById('requerimiento').value,
                            document.getElementById('mandamiento').value,
                        ]
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const determinacion = document.getElementById('determinacion').value
                        const requerimiento = document.getElementById('requerimiento').value
                        const mandamiento = document.getElementById('mandamiento').value
                        const pdf = document.getElementById('pdf').value
                            if (pdf == 1) {
                                window.open(`PDFDeterminacion/${determinacion}`)
                            } else if (pdf == 2) {
                                window.open(`PDFRequerimiento/${requerimiento}`)
                            } else if (pdf == 3) {
                                window.open(`PDFMandamiento/${mandamiento}`)
                            } else {
                                Swal.fire({
                                icon: 'error',
                                title: 'Seleccione una opción valida',
                                showConfirmButton: false,
                                timer: 3000
                                })
                            }
                    }
                })
            })()
        </script>
    @endif
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

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
                    html: '<input type="hidden" value="{{ Session::get('determinacion') }}" id="determinacion" name="determinacion" class="swal2-input">' +
                        '<input type="hidden" value="{{ Session::get('requerimiento') }}" id="requerimiento" name="requerimiento" class="swal2-input">' +
                        '<input type="hidden" value="{{ Session::get('mandamiento') }}" id="mandamiento" name="mandamiento" class="swal2-input">' +
                        `
                        <select class="form-select form-select-lg mb-3" id="pdf" data-style="btn-warning" data-live-search="true" >
                        <option value="0"  selected>Seleccione un pdf</option>
                        <option value="1">Determinación</option>
                            
                        @if (Session::get('requerimiento') != 0)
                            <option value="2">Requerimiento</option>
                        @endif
                        @if (Session::get('mandamiento') != 0)
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
    <div class="container">
        <div class="my-2">
            <h2 style="text-shadow: 0px 0px 2px #717171;">Tijuana Agua</h2>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">
                <h5 style="text-shadow: 0px 0px 2px #717171;">Generar formatos</h5>
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
                            <form action="{{ route('search') }}" method="GET" id="search-form">
                                @csrf
                                <div class="justify-content-center justify-content-md-center d-flex flex-row gap-4">
                                    <div class="input-group justify-content-center">
                                        <input type="search" name="search" maxlength="10"
                                            class="form-control border-secondary"
                                            placeholder="Buscar cuenta predial o propietario" id="mysearch" required
                                            autofocus />
                                    </div>
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </blockquote>
            </div>
            {{-- Contenedor de las consultas por jquery --}}
            <div id="showlist">
                {{-- {{ $cuenta }} --}}
                @if (session('result'))
                    {{-- {{session('cuenta') }} --}}
                    @if (Session::get('cuenta')  != 'none')
                        <table class="table table-hover table-sm table-dark my-2">
                            <thead class="table-dark">
                                <tr>
                                    <td scope="col" style="text-align:center; width:12%;">Cuenta Predial</td>
                                    <td scope="col" style="text-align:center; width:35%;">Propietario</td>
                                    <td scope="col" style="text-align:center;">Opciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="col" class="table-light" style="text-align:center;width:12%;">
                                        {{Session::get('cuenta')}} 
                                    </td>
                                    <td scope="col" class="table-light" style="text-align:center;width:35%;">
                                        {{Session::get('propietario') }}
                                    </td>
                                    <td class="table-light" style="text-align:center;">
                                        <a class="btn btn-outline-dark btn-sm" href="{{url('calculo',Session::get('cuenta'))}}"
                                            style="padding:0%;border:0px;" data-toggle="tooltip" data-placement="left"
                                            title="Determinacion"><img
                                                src="https://img.icons8.com/color/30/7950F2/signing-a-document.png" />
                                            Determinacion</a>
                                        <a class="btn btn-outline-dark btn-sm" href="{{url('formR',Session::get('cuenta'))}}"
                                            style="padding:0%;border:0px;" data-toggle="tooltip" data-placement="bottom"
                                            title="Requerimiento" name="requerimiento"><img
                                                src="https://img.icons8.com/color/30/000000/scale-tool.png" />
                                            Requerimiento</a>
                                        <a class="btn btn-outline-dark btn-sm" href="{{url('calculoM',Session::get('cuenta'))}}"
                                            style="padding:0%;border:0px;" data-toggle="tooltip" data-placement="right"
                                            title="Madamiento" name="mandamiento"><img
                                                src="https://img.icons8.com/fluency/30/000000/general-ledger.png" />
                                            Mandamiento</a>
                                        <a class="btn btn-outline-dark btn-sm" href="{{url('pdf',Session::get('cuenta'))}}"
                                            style="padding:0%;border:0px;" data-toggle="tooltip" data-placement="right"
                                            title="Pdf generados" name="pdf">
                                            <img src="https://img.icons8.com/fluency/30/null/pdf.png" />
                                            PDF Generados</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                    @if (Session::get('cuenta')  == 'none')
                        <div class="alert alert-danger mt-2 text-danger" role="alert">
                            No se encontro la cuenta
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection

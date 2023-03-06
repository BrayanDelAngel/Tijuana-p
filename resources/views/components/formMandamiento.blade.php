@extends('layouts.index')
@section('titulo')
    Mandamiento
@endsection
@section('css')
    <link href="{{ asset('css/addInput.css') }}" rel="stylesheet">
@endsection
@section('contenido')
    <div class="container position-static">
        <div class="mt-4">
            <h2 style="text-shadow: 0px 0px 2px #717171;"><img src="https://img.icons8.com/color/47/null/signature.png" />
                Formato de Madamiento</h2>
            <h4 style="text-shadow: 0px 0px 2px #717171;">Tijuana</h4>
        </div>
        <hr>
        <div class="p-3 mx-auto">
            <form action="{{ route('guardar-mandamiento') }}" method="post" novalidate>
                @csrf
                <div class="row">
                    @foreach ($date as $item)
                        <div class="p-2 rounded-4 col-md-7" style=" background-color: #E8ECEF; border: inherit;">
                            <div class="text-white m-2 align-items-end" style="text-align:right;">
                                <span class="bg-success rounded-2 p-2"><img
                                        src="https://img.icons8.com/fluency/30/000000/user-manual.png" />Datos
                                    Generales</span>
                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="credito" class="form-label">Crédito Número*</label>
                                        <input type="text" id="credito"
                                            class="form-control mb-2 
                                        @error('credito')
                                        border border-danger rounded-2
                                        @enderror"
                                            name="credito" value="{{ old('credito') }}" placeholder="Crédito">
                                        @error('credito')
                                            <div class="text-danger text-center">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="oficio" class="form-label">Oficio:*</label>
                                        <div class="input-group mb-6">
                                            <input type="text" class="form-control mb-2" value="TP/PAE/" disabled>
                                            <input type="text" value="{{ old('oficio') }}" id="oficio"
                                                class="form-control mb-2
                                            @error('oficio')
                                            border border-danger rounded-2
                                            @enderror"
                                                name="oficio">
                                            <input type="text" class="form-control mb-2" value="/{{ date('Y') }}"
                                                disabled>
                                        </div>
                                        @error('oficio')
                                            <div class="text-danger text-center">
                                                @if ($message == 'El campo oficio ya ha sido tomado.')
                                                    El campo oficio ya ha sido tomado.
                                                @else
                                                    El campo oficio es requerido
                                                @endif
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="propietario" class="form-label">Propietario:*</label>
                                        <input type="text" value="{{ $item->Propietario }}" id="propietario"
                                            class="form-control mb-2
                                            @error('propietario')
                                            border border-danger rounded-2
                                            @enderror"
                                            name="propietario" readonly>
                                        @error('propietario')
                                            <div class="text-danger text-center">
                                                El campo propietario es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="clavec" class="form-label">Clave Castastral:*</label>
                                        <input type="text" class="form-control mb-2" id="clavec" name="clavec"
                                            value="{{ $item->Clave }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="domicilio" class="form-label">Domicilio*</label>
                                        <input type="text" value="{{ $item->Domicilio }}" id="domicilio"
                                            class="form-control mb-2
                                        @error('domicilio')
                                        border border-danger rounded-2
                                        @enderror"
                                            name="domicilio" readonly>
                                        @error('domicilio')
                                            <div class="text-danger text-center">
                                                El campo domicilio es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="mandamiento" class="form-label mb-2">Fecha emisión de
                                            mandamiento:*</label>
                                        <input type="date"
                                            class="form-control mb-2
                                        @error('mandamiento')
                                        border border-danger rounded-2
                                        @enderror"
                                            id="mandamiento" name="emision" value="{{ old('mandamiento') }}">
                                        @error('mandamiento')
                                            <div class="text-danger text-center">
                                                El campo mandamiento es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="cuenta" class="form-label mb-2">Cuenta:*</label>
                                        <input type="text" value="{{ $item->Cuenta }}" readonly
                                            class="form-control mb-2
                                        @error('cuenta')
                                        border border-danger rounded-2
                                        @enderror"
                                            id="cuenta" name="cuenta">
                                        @error('cuenta')
                                            <div class="text-danger text-center">
                                                El campo cuenta es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="tservicio" class="form-label mb-2">Tipo de servicio:*</label>
                                        <input type="text"
                                            class="form-control mb-2
                                        @error('tservicio')
                                        border border-danger rounded-2
                                        @enderror"
                                            id="tservicio" name="tservicio" value="{{ $item->TipoServicio }}">
                                        @error('tservicio')
                                            <div class="text-danger text-center">
                                                El campo servicio es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="serie" class="form-label mb-2">Serie medidor:*</label>
                                        <input type="text"
                                            class="form-control mb-2
                                        @error('serie')
                                        border border-danger rounded-2
                                        @enderror"
                                            id="serie" name="serie" value="{{ $item->SerieMedidor }}">
                                        @error('serie')
                                            <div class="text-danger text-center">
                                                El campo serie es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="determinacion" class="form-label mb-2">Fecha de
                                            determinacion:*</label>
                                        <input type="date"
                                            class="form-control mb-2
                                        @error('determinacion')
                                        border border-danger rounded-2
                                        @enderror"
                                            id="determinacion" name="determinacion" value="{{ old('determinacion') }}">
                                        @error('determinacion')
                                            <div class="text-danger text-center">
                                                El campo determinacion es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="ndeterminacion" class="form-label mb-2">Fecha de notificacion
                                            determinacion:*</label>
                                        <input type="date"
                                            class="form-control mb-2
                                        @error('ndeterminacion')
                                        border border-danger rounded-2
                                        @enderror"
                                            id="ndeterminacion" name="ndeterminacion"
                                            value="{{ old('ndeterminacion') }}">
                                        @error('ndeterminacion')
                                            <div class="text-danger text-center">
                                                El campo notificacion determinacion es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="notificacion" class="form-label mb-2">Fecha notificación de
                                            requerimiento:*</label>
                                        <input type="date"
                                            class="form-control mb-2
                                        @error('notificacion')
                                        border border-danger rounded-2
                                        @enderror"
                                            id="notificacion" name="notificacion" value="{{ old('notificacion') }}">
                                        @error('notificacion')
                                            <div class="text-danger text-center">
                                                El campo notificacion es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="sobrerecaudador" class="form-label mb-2">Sobrerecaudador:*</label>
                                        <input type="text"
                                            class="form-control mb-2
                                                @error('sobrerecaudador')
                                                border border-danger rounded-2
                                                @enderror"
                                            id="sobrerecaudador" name="sobrerecaudador"
                                            value="{{ old('sobrerecaudador') }}">
                                        @error('sobrerecaudador')
                                            <div class="text-danger text-center">
                                                El campo sobrerecaudador es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <label for="periodo" class="form-label mb-2">Periodo*</label>
                                    <div class="d-flex">
                                        <div class="md-form form-group">
                                            <input type="date"
                                                class="form-control mb-2
                                                    @error('p1')
                                                    border border-danger rounded-2
                                                    @enderror"
                                                id="p1" name="p1" value="{{ old('p1') }}">
                                            @error('p1')
                                                <div class="text-danger text-center">
                                                    El campo periodo inicio es requerido
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="md-form form-group ">
                                            <input type="date"
                                                class="form-control mb-2
                                                    @error('p2')
                                                    border border-danger rounded-2
                                                    @enderror"
                                                id="p2" name="p2" value="{{ old('p2') }}">
                                            @error('p2')
                                                <div class="text-danger text-center">
                                                    El campo periodo fin es requerido
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="p-2 rounded-4 col-md-4"
                        style=" background-color: #E8ECEF; border: inherit; margin-left: 10px;">
                        <div class="text-white m-2 align-items-end" style="text-align:right;">
                            <span class="bg-success rounded-2 p-2"><img
                                    src="https://img.icons8.com/fluency/30/null/group.png" />Ejecutores</span>
                        </div>
                        <div class="col-md-4 my-auto" style="margin-left: 80%">
                            <button class="btn btn-primary" type="button" id="agregar">
                                <img src="https://img.icons8.com/fluency/24/null/add.png" />
                            </button>
                        </div>
                        <div class="clonar col-md-8 text-center ">
                            <div class="row align-items-start" style="margin-left: 10%">
                                <label for="ejecutor.0" class="form-label">Notificador y/o Ejecutor:*</label>
                                <input type="text" value="{{ old('ejecutor.0') }}" id="ejecutor.0"
                                    class="form-control mb-2
                                                    @error('ejecutor.0')
                                                    border border-danger rounded-2
                                                    @enderror"
                                    name="ejecutor[]">
                                @error('ejecutor.0')
                                    <div class="text-danger text-center">
                                        El campo es requerido
                                    </div>
                                @enderror
                                <button class="btn btn-warning puntero ocultar mt-4"
                                    style="width: 5%; position: absolute; left: 78%;" type="button">
                                    <img src="https://img.icons8.com/fluency/24/null/minus.png" />
                                </button>
                            </div>
                        </div>
                        <div id="contenedor"></div>
                    </div>
                </div>
                <div class="p-2 rounded-4 mt-3" style=" background-color: #E8ECEF; border: inherit;">
                    <div class="text-white m-2 align-items-end" style="text-align:right;">
                        <span class="bg-success rounded-2 p-2"><img
                                src="https://img.icons8.com/fluency/30/000000/user-manual.png" />Adeudo</span>
                    </div>
                    <table class="table table-hover table-sm table-dark my-2">
                        <thead class="table-dark text-center">
                            <tr>
                                <th colspan="2">PERIODO</th>
                                <th rowspan="2">ADEUDO POR CONSUMO DE AGUA Y ALCANTARILLADO</th>
                                <th rowspan="2">IMPORTE DE RECARGOS</th>
                                <th rowspan="2">IMPORTE DE LA MULTA</th>
                                <th rowspan="2">TOTAL</th>
                            </tr>
                            <tr>
                                <th>
                                    MES
                                </th>
                                <th>
                                    AÑO
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-light text-center">
                            @foreach ($cobranza as $item)
                                <tr>
                                    <td>{{ $mes[$item->mes - 1] }}</td>
                                    <td>{{ $item->anio }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-center">Totales</td>
                                <td class="text-center">$ &nbsp;&nbsp;</td>
                                <td class="text-center">$ &nbsp;&nbsp;</td>
                                <td class="text-center">$ &nbsp;&nbsp;</td>
                                <td class="text-center">$ &nbsp;&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="p-2 rounded-4 mt-3" style=" background-color: #E8ECEF; border: inherit;">
                    <div class="text-white m-2 align-items-end" style="text-align:right;">
                        <span class="bg-success rounded-2 p-2"><img
                                src="https://img.icons8.com/fluency/30/000000/user-manual.png" />Adeudo</span>
                    </div>
                    <table class="table table-hover table-sm table-dark my-2">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>TIPO DE DILIGENCIA</th>
                                <th>IMPORTE DEL CREDITO Fiscal</th>
                                <th>PORCENTAJE POR GASTOS DE EJECUCIÓN</th>
                                <th>IMPORTE DE LOS GASTOS DE EJECUCIÓN CONSIDERANDO EL IMPORTE MÍNIMO.</th>
                            </tr>
                        </thead>
                        <tbody class="table-light text-center">
                            <tr>
                                <td class="text-center">Requerimiento de pago</td>
                                <td class="text-center">&nbsp;&nbsp;</td>
                                <td class="text-center">2%</td>
                                <td class="text-center">&nbsp;&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="text-center">Embargo</td>
                                <td class="text-center">&nbsp;&nbsp;</td>
                                <td class="text-center">2%</td>
                                <td class="text-center">&nbsp;&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="p-2 rounded-4 mt-3" style=" background-color: #E8ECEF; border: inherit;">
                    <div class="text-white m-2 align-items-end" style="text-align:right;">
                        <span class="bg-success rounded-2 p-2"><img
                                src="https://img.icons8.com/fluency/30/000000/user-manual.png" />Adeudo</span>
                    </div>
                    <table class="table table-hover table-sm table-dark my-2">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>DESCRIPCIÓN DE
                                    CONCEPTO
                                </th>
                                <th>ADEUDO CONSUMO
                                    DE AGUA Y ALCANTARILLADO
                                </th>
                                <th>RECARGOS
                                </th>
                                <th>MULTAS</th>
                                <th>GASTOS DE EJECUCIÓN</th>
                                <th>IMPORTE TOTAL DEL ADEUDO</th>
                            </tr>
                        </thead>
                        <tbody class="table-light text-center">
                            <tr>
                                <td class="text-center">Totales</td>
                                <td class="text-center">$0.00</td>
                                <td class="text-center">$0.00</td>
                                <td class="text-center">$0.00</td>
                                <td class="text-center">$0.00</td>
                                <td class="text-center">$0.00</td>
                            </tr>
                            <tr>
                                <td class="text-center">Total del adeudo requerido</td>
                                <td class="text-center bold" colspan="5">$
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-row p-4">
                    <div class="col">
                        <div style="text-align:right;">
                            <a href="{{ route('index') }}" class="btn btn-dark btn-sm"><img
                                    src="https://img.icons8.com/fluency/30/null/cancel.png" />
                                Cancelar</a>
                            <button type="submit" class="btn btn-primary btn-sm" target="_blank"><img
                                    src="https://img.icons8.com/fluency/30/null/pdf.png" />
                                Generar Requerimiento</button>
                        </div>
                    </div>
                </div>
                <form>
        </div>
        <hr>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/addInput.js') }}"></script>
@endsection

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
                    <input type="hidden" name="id" value="{{$item->id}}">
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
                                            name="credito" value="{{ $item->folio }}" placeholder="Crédito" disabled>
                                        @error('credito')
                                            <div class="text-danger text-center">
                                                El campo crédito número es requerido.
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="oficio" class="form-label">Oficio:*</label>
                                        <div class="input-group mb-6">
                                            <input type="text" class="form-control mb-2" value="CESPT/EDM/" disabled>
                                            <input type="text" value="{{ $folio }}" id="oficio"
                                                class="form-control mb-2
                                            @error('oficio')
                                            border border-danger rounded-2
                                            @enderror"
                                                name="oficio" disabled>
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
                                            name="propietario" disabled>
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
                                            value="{{ $item->Clave }}" disabled>
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
                                            name="domicilio" disabled>
                                        @error('domicilio')
                                            <div class="text-danger text-center">
                                                El campo domicilio es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="fecham" class="form-label mb-2">Fecha emisión de
                                            mandamiento:*</label>
                                        <input type="date"
                                            class="form-control mb-2
                                        @error('fecham')
                                        border border-danger rounded-2
                                        @enderror"
                                            id="fecham" name="fecham" value="{{ old('fecham') }}">
                                        @error('fecham')
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
                                        <input type="text" value="{{ $item->Cuenta }}" disabled
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
                                            id="tservicio" name="tservicio" value="{{ $item->TipoServicio }}" disabled>
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
                                            id="serie" name="serie" value="{{ $item->SerieMedidor }}" disabled>
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
                                            determinación:*</label>
                                        <input type="date"
                                            class="form-control mb-2
                                        @error('determinacion')
                                        border border-danger rounded-2
                                        @enderror"
                                            id="determinacion" name="determinacion" value="{{$item->fechand }}" disabled>
                                        @error('determinacion')
                                            <div class="text-danger text-center">
                                                El campo determinación es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="ndeterminacion" class="form-label mb-2">Fecha de notificacion
                                            determinación:*</label>
                                        <input type="date"
                                            class="form-control mb-2
                                        @error('ndeterminacion')
                                        border border-danger rounded-2
                                        @enderror"
                                            id="ndeterminacion" name="ndeterminacion" value="{{ $item->Fecha_noti_d }}" disabled>
                                        @error('ndeterminacion')
                                            <div class="text-danger text-center">
                                                El campo notificación determinación es requerido
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
                                            id="sobrerecaudador" name="sobrerecaudador" value="{{ $item->Recaudador }}">
                                        @error('sobrerecaudador')
                                            <div class="text-danger text-center">
                                                El campo sobrerecaudador es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <label for="periodo" class="form-label mb-2">Periodo*</label>
                                    <div class="md-form form-group">
                                        <input type="text"
                                            class="form-control mb-2 text-center
                                                    @error('periodo')
                                                    border border-danger rounded-2
                                                    @enderror"
                                            id="periodo" name="periodo" value="{{ $item->periodo}}" disabled>
                                        @error('periodo')
                                            <div class="text-danger text-center">
                                                El campo periodo inicio es requerido
                                            </div>
                                        @enderror
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
                                        El campo Notificador y/o Ejecutor es requerido
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

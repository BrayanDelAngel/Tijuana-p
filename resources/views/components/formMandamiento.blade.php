@extends('layouts.index')
@section('titulo')
    Mandamiento
@endsection
@section('css')
    <link href="{{ asset('css/addInput.css') }}" rel="stylesheet">
    <style>
        table {
            border-collapse: collapse;
        }

        .vrt-header th {
            min-width: 50px;
            /* for firefox */
            white-space: nowrap;
            writing-mode: vertical-rl;
            transform: scale(-1);
            padding: 10px 5px 0;
            vertical-align: top;
        }
    </style>
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
                @foreach ($date as $item)
                    <div class="row m-2">
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="p-2 rounded-4 col-md-12" style=" background-color: #E8ECEF; border: inherit;">
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
                                <div class="col-md-6 ">
                                    <label for="periodo" class="form-label mb-2">Periodo*</label>
                                    <div class="md-form form-group">
                                        <input type="text"
                                            class="form-control mb-2 text-center
                                                    @error('periodo')
                                                    border border-danger rounded-2
                                                    @enderror"
                                            id="periodo" name="periodo" value="{{ $item->periodo }}" disabled>
                                        @error('periodo')
                                            <div class="text-danger text-center">
                                                El campo periodo inicio es requerido
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
                                            id="determinacion" name="determinacion" value="{{ $item->fechand }}"
                                            disabled>
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
                                            id="ndeterminacion" name="ndeterminacion" value="{{ $item->Fecha_remi_c }}"
                                            disabled>
                                        @error('ndeterminacion')
                                            <div class="text-danger text-center">
                                                El campo notificación determinación es requerido
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

                            </div>
                        </div>
                        {{-- <div class="p-2 rounded-4 col-md-4"
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
                        </div> --}}
                    </div>
                    <div class="p-2 rounded-4" style=" background-color: #E8ECEF; border: inherit;">
                        <div class="text-white m-2 align-items-end" style="text-align:right;">
                            <span class="bg-success rounded-2 p-2"><img
                                    src="https://img.icons8.com/fluency/30/000000/user-manual.png" />Adeudo</span>
                        </div>
                        <table class="table table-hover table-sm table-dark my-4">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>DESCRIPCIÓN DE CONCEPTO</th>
                                    <th>ADEUDO CONSUMODE AGUA Y ALCANTARILLADO</th>
                                    <th>RECARGOS</th>
                                    <th>MULTAS</th>
                                    <th>GASTOSDE EJECUCIÓN</th>
                                    <th>SUSP. DEL SERVICIOOTROS GASTOS</th>
                                    <th>CONV.VENCIDOS</th>
                                    <th>IMPORTE TOTAL DEL ADEUDO</th>
                                </tr>
                            </thead>
                            <tbody class="table-light text-center">
                                <tr>
                                    <td>Totales</td>
                                    <td>${{ number_format($t_adeudo_t->totalPeriodo, 2) }}</td>
                                    <td>${{ number_format($t_adeudo_t->RecargosAcumulados, 2) }}</td>
                                    <td>${{ number_format($item->multas, 2) }}</td>
                                    <td>${{ number_format($item->gastos_ejecución, 2) }}</td>
                                    <td>${{ number_format($item->otros_gastos, 2) }}</td>
                                    <td>${{ number_format($item->conv_vencido, 2) }}</td>
                                    <td>${{ $total_ar }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center"> Total del adeudo requerido</td>
                                    <td class="text-center font-weight-bold" colspan="7" style="font-weight: bold">
                                        ${{ $total_ar }} {{ $tar }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- <table class="table table-hover table-sm table-dark my-4">
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
                                    <td class="text-center">
                                        <input type="text" name="pagor" id="pagor" value="{{ old('pagor') }}"
                                            class="form-control mb-2  
                                                @error('pagor')
                                                border border-danger rounded-2
                                                @enderror"
                                            onchange="Porcentaje()" />
                                        @error('pagor')
                                            <div class="text-danger text-center">
                                                El campo pago requerimiento es requerido
                                            </div>
                                        @enderror
                                    </td>
                                    <td class="text-center">2%</td>
                                    <td class="text-center">
                                        <input type="text" name="totalr" id="totalr" value="{{ old('totalr') }}"
                                            class="form-control mb-2  
                                        @error('totalr')
                                        border border-danger rounded-2
                                        @enderror"
                                            readonly onchange="Porcentaje()" />
                                        @error('totalr')
                                            <div class="text-danger text-center">
                                                El campo total es requerido
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Embargo</td>
                                    <td class="text-center">
                                        <input type="text" name="pagoe" id="pagoe" value="{{ old('pagoe') }}"
                                            class="form-control mb-2  
                                    @error('pagoe')
                                    border border-danger rounded-2
                                    @enderror"
                                            onchange="Porcentaje()" />
                                        @error('pagoe')
                                            <div class="text-danger text-center">
                                                El campo pago embargo es requerido
                                            </div>
                                        @enderror
                                    </td>
                                    <td class="text-center">2%</td>
                                    <td class="text-center">
                                        <input type="text" name="totale" id="totale" value="{{ old('totale') }}"
                                            class="form-control mb-2  
                                        @error('totale')
                                        border border-danger rounded-2
                                        @enderror"
                                            readonly onchange="Porcentaje()" />
                                        @error('totale')
                                            <div class="text-danger text-center">
                                                El campo total es requerido
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table> --}}

                    </div>
                    {{-- <div class="p-2 rounded-4 mt-3" style=" background-color: #E8ECEF; border: inherit;">
                        <div class="text-white m-2 align-items-end" style="text-align:right;">
                            <span class="bg-success rounded-2 p-2"><img
                                    src="https://img.icons8.com/fluency/30/null/resume.png" />Resumen</span>
                        </div>
                        <div class="" style="overflow-x: auto;overflow-y: scroll;">
                            <table class="table table-hover table-sm table-dark my-2 mx-auto">
                                <thead class="vrt-header">
                                    <tr class="tr">
                                        <th class="th">
                                            <h6>Meses de adeudo</h6>
                                        </th>
                                        <th class="th">
                                            <h6>Periodo de consumo facturado</h6>
                                        </th>
                                        <th class="th">
                                            <h6>Fecha de vencimiento</h6>
                                        </th>
                                        <th class="th">
                                            <h6>Lectura facturada en m3</h6>
                                        </th>
                                        <th class="th">
                                            <h6>Tarifa art. 11 enciso a)</h6>
                                        </th>
                                        <th class="th">
                                            <h6>
                                                Tarifa art. 11 excedente del básico en m3 de la Ley de Ingresos del
                                                Estado de Baja
                                                <br />
                                                California ejercicios fiscales anteriores al 2020;
                                                actualmente art 10.
                                            </h6>
                                        </th>
                                        <th class="th">
                                            <h6>Suma de tarifas</h6>
                                        </th>
                                        <th class="th">
                                            <h6>
                                                Factor de actualización (capítulo I Ley de Ingresos vigente a la
                                                fecha de facturación)
                                            </h6>
                                        </th>
                                        <th class="th">
                                            <h6>Saldo Atraso</h6>
                                        </th>
                                        <th class="th">
                                            <h6>Saldo Rezago</h6>
                                        </th>
                                        <th class="th">
                                            <h6>
                                                Total del periodo facturado (ley de ingresos vigente a la
                                                <br />
                                                fecha de la facturación)
                                            </h6>
                                        </th>
                                        <th class="th">
                                            <h6>
                                                Tasa de interés por adeudo mensual vencido
                                                (artículo 37 ley de ingresos del estado)
                                            </h6>
                                        </th>
                                        <th class="th">
                                            <h6>
                                                Importe mensual por concepto de recargos (adeudo del periodo
                                                <br />
                                                facturado x tasa de interés por adeudo mensual vencido)
                                            </h6>
                                        </th>
                                        <th class="th">
                                            <h6>
                                                Recargos acumulados por mensualidades vencidas
                                                <br />
                                                (meses de adeudo x importe mensual por concepto de recargos )
                                                <br />este importe no puede ser mayor al adeudo del periodo facturado
                                            </h6>
                                        </th>
                                        <th class="th">
                                            <h6>
                                                Acción
                                            </h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">
                                    @foreach ($items as $item)
                                        <tr class="tr">
                                            <td class="td">{{ $item->meses }}</td>
                                            <td class="td">{{ $item->periodo }}</td>
                                            <td class="td">{{ $item->fecha_vto }}</td>
                                            <td class="td">{{ $item->lecturaFacturada }}</td>
                                            <td class="td">${{ number_format($item->tarifa1, 2) }}</td>
                                            <td class="td">${{ number_format($item->tarifa2, 2) }}</td>
                                            <td class="td">${{ number_format($item->sumaTarifas, 2) }}</td>
                                            <td class="td">{{ number_format($item->factor, 4) }}</td>
                                            <td class="td">${{ number_format($item->saldoAtraso, 2) }}</td>
                                            <td class="td">${{ number_format($item->saldoRezago, 2) }}</td>
                                            <td class="td">${{ number_format($item->totalPeriodo, 2) }}</td>
                                            <td class="td">2.25</td>
                                            <td class="td">${{ number_format($item->importeMensual, 2) }}</td>
                                            <td class="td">${{ number_format($item->RecargosAcumulados, 2) }}</td>
                                            <td class="td">
                                                <div class="row">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        id="btnmodal" data-bs-toggle="modal"
                                                        data-cuenta="{{ $item->cuenta }}"
                                                        data-meses="{{ $item->meses }}"
                                                        data-periodo="{{ $item->periodo }}"
                                                        data-fecha_vto="{{ $item->fecha_vto }}"
                                                        data-lf="{{ $item->lecturaFacturada }}"
                                                        data-t1="{{ number_format($item->tarifa1, 2) }}"
                                                        data-t2="{{ number_format($item->tarifa2, 2) }}"
                                                        data-st="{{ number_format($item->sumaTarifas, 2) }}"
                                                        data-f="{{ number_format($item->factor, 4) }}"
                                                        data-sa="{{ number_format($item->saldoAtraso, 2) }}"
                                                        data-sr="{{ number_format($item->saldoRezago, 2) }}"
                                                        data-tp="{{ number_format($item->totalPeriodo, 2) }}"
                                                        data-im="{{ number_format($item->importeMensual, 2) }}"
                                                        data-ra="{{ number_format($item->RecargosAcumulados, 2) }}"
                                                        data-bs-target="#exampleModal">
                                                        <img src="https://img.icons8.com/fluency/18/null/edit.png" />
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="eliminarfila({{ $item->cuenta }},{{ $item->meses }})">
                                                        <img src="https://img.icons8.com/fluency/18/null/cancel.png" />
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{ $items->links() }}
                        </div>
                    </div> --}}
                    <div class="form-row p-4">
                        <div class="col">
                            <div style="text-align:right;">
                                <a href="{{ route('index') }}" class="btn btn-dark btn-sm"><img
                                        src="https://img.icons8.com/fluency/30/null/cancel.png" />
                                    Cancelar</a>
                                <button type="submit" class="btn btn-primary btn-sm" target="_blank"><img
                                        src="https://img.icons8.com/fluency/30/null/pdf.png" />
                                    Generar Mandamiento</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </form>
        </div>
        <hr>
    </div>
    {{-- Modal de  Impuesto Predial --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Impuesto Predial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('modificar_tablaM') }}" method="post" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="cuentaT" name="cuentaT" hidden>
                            <label for="lecturaFacturadaT" class="form-label">Meses </label>
                            <input type="text" class="form-control" id="mesesT" name="mesesT" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="lecturaFacturadaT" class="form-label">Lectura Facturada
                            </label>
                            <input type="text"
                                class="form-control
                            @error('lecturaFacturadaT')
                            border border-danger rounded-2
                            @enderror"
                                id="lecturaFacturadaT" name="lecturaFacturadaT">
                            @error('lecturaFacturadaT')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="periodoT" class="form-label">Periodo
                            </label>
                            <input type="text"
                                class="form-control
                            @error('periodoT')
                            border border-danger rounded-2
                            @enderror"
                                id="periodoT" name="periodoT">
                            @error('periodoT')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="fecha_vtoT" class="form-label">Fecha Vencimiento</label>
                            <input type="text"
                                class="form-control
                            @error('fecha_vtoT')
                            border border-danger rounded-2
                            @enderror"
                                id="fecha_vtoT" name="fecha_vtoT">
                            @error('fecha_vtoT')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tarifa1T" class="form-label">Tarifa 1</label>
                            <input type="text"
                                class="form-control
                            @error('tarifa1T')
                            border border-danger rounded-2
                            @enderror"
                                id="tarifa1T" name="tarifa1T">
                            @error('tarifa1T')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="tarifa2T" class="form-label">Tarifa 2</label>
                            <input type="text"
                                class="form-control
                            @error('tarifa2T')
                            border border-danger rounded-2
                            @enderror"
                                id="tarifa2T" name="tarifa2T">
                            @error('tarifa2T')
                                <div class="text-danger text-center">
                                    El campo tarifa dos es requerido
                                </div>
                            @enderror
                        </div> --}}
                        <div class="mb-3">
                            <label for="sumaTarifasT" class="form-label">Suma Tarifas</label>
                            <input type="text"
                                class="form-control
                            @error('sumaTarifasT')
                            border border-danger rounded-2
                            @enderror"
                                id="sumaTarifasT" name="sumaTarifasT">
                            @error('sumaTarifasT')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="factorT" class="form-label">Factor</label>
                            <input type="text"
                                class="form-control
                            @error('factorT')
                            border border-danger rounded-2
                            @enderror"
                                id="factorT" name="factorT">
                            @error('factorT')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="saldoAtrasoT" class="form-label">Saldo Atraso</label>
                            <input type="text"
                                class="form-control
                            @error('saldoAtrasoT')
                            border border-danger rounded-2
                            @enderror"
                                id="saldoAtrasoT" name="saldoAtrasoT">
                            @error('saldoAtrasoT')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="saldoRezagoT" class="form-label">Saldo Rezago</label>
                            <input type="text"
                                class="form-control
                            @error('saldoRezagoT')
                            border border-danger rounded-2
                            @enderror"
                                id="saldoRezagoT" name="saldoRezagoT">
                            @error('saldoRezagoT')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="totalPeriodoT" class="form-label">Saldo Rezago</label>
                            <input type="text"
                                class="form-control
                            @error('totalPeriodoT')
                            border border-danger rounded-2
                            @enderror"
                                id="totalPeriodoT" name="totalPeriodoT">
                            @error('totalPeriodoT')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="importeMensualT" class="form-label">Importe mensual</label>
                            <input type="text"
                                class="form-control
                            @error('importeMensualT')
                            border border-danger rounded-2
                            @enderror"
                                id="importeMensualT" name="importeMensualT">
                            @error('importeMensualT')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="RecargosAcumuladosT" class="form-label">Recargos Acumulados</label>
                            <input type="text"
                                class="form-control
                            @error('RecargosAcumuladosT')
                            border border-danger rounded-2
                            @enderror"
                                id="RecargosAcumuladosT" name="RecargosAcumuladosT">
                            @error('RecargosAcumuladosT')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><img
                                src="https://img.icons8.com/fluency/30/null/cancel.png" />
                            Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/addInput.js') }}"></script>
    <script src="{{ asset('js/porcentaje.js') }}"></script>
    <script src="{{ asset('js/modalTabla.js') }}"></script>
    <script src="{{ asset('js/deleteRowM.js') }}"></script>
@endsection

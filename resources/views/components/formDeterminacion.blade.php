@extends('layouts.index')
@section('titulo')
    Determinación
@endsection
@section('css')
<style>
    table {
      border-collapse: collapse;
    }
    .vrt-header th {
      min-width: 50px; /* for firefox */
      white-space: nowrap;
      writing-mode: vertical-rl;
      transform: scale(-1);
      padding: 10px 5px 0;
      vertical-align: top;
    }
  </style>
@endsection
@section('contenido')
    <div class=" row">
        <div class="col-2 m-2">
            <table class="table table-hover table-sm rounded-4 mt-5">
                <thead class="text-white text-center" style="background-color: #406473;opacity: 0.80;">
                    <th>Folio</th>
                    <th>Cuenta</th>
                </thead>
                <tbody>
                    @foreach ($folios as $item)
                        <tr>
                            <td>
                                {{ $item->folio }}
                            </td>
                            <td>
                                {{ $item->cuenta }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex">
                {{ $folios->links() }}
            </div>
        </div>
        <div class=" container col-9">
            <div class="mt-4">
                <h2 style="text-shadow: 0px 0px 2px #717171;"><img src="https://img.icons8.com/color/47/null/signature.png" />
                    Formato de Determinación</h2>
                <h4 style="text-shadow: 0px 0px 2px #717171;">Tijuana</h4>
            </div>
            <hr>
            <div class="p-3 mx-auto">
                <form action="{{ route('guardar-determinacion') }}" method="post" novalidate>
                    @csrf
                    @foreach ($date as $item)
                        <div class="p-2 rounded-4 col-md-12" style=" background-color: #E8ECEF; border: inherit;">
                            <div class="text-white m-2 align-items-end" style="text-align:right;">
                                <span class="bg-success rounded-2 p-2"><img
                                        src="https://img.icons8.com/fluency/30/000000/user-manual.png" />Datos
                                    Generales</span>
                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-4">
                                    <div class="md-form form-group">
                                        <label for="folio" class="form-label">Folio:*</label>
                                        <div class="input-group mb-6">
                                            <input type="text" class="form-control mb-2" value="CESPT/EDM/" readonly>
                                            @if ($folio != 0)
                                            @else
                                                {{ $folio = '' }}
                                            @endif
                                            <input type="text" value="{{ $folio }}" id="folio"
                                                class="form-control mb-2
                                                    @error('folio')
                                                    border border-danger rounded-2
                                                    @enderror"
                                                name="folio">
                                            <input type="text" class="form-control mb-2" value="/{{ date('Y') }}"
                                                disabled>
                                        </div>
                                        @error('folio')
                                            <div class="text-danger text-center">
                                                @if ($message == 'The folio has already been taken.')
                                                    El campo folio ya ha sido tomado.
                                                @else
                                                    El campo folio es requerido
                                                @endif
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="md-form form-group">
                                        <label for="cuenta" class="form-label mb-2">Cuenta:*</label>
                                        <input type="text" value="{{ $item->Cuenta }}"
                                            class="form-control mb-2
                                                @error('cuenta')
                                                border border-danger rounded-2
                                                @enderror"
                                            id="cuenta" name="cuenta" readonly>
                                        @error('cuenta')
                                            <div class="text-danger text-center">
                                                El campo cuenta es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="md-form form-group">
                                        <label for="clavec" class="form-label">Clave Castastral:*</label>
                                        <input type="text"
                                            class="form-control mb-2
                                    @error('clavec')
                                    border border-danger rounded-2
                                    @enderror"
                                            id="clavec" name="clavec" value="{{ $item->Clave }}" readonly>
                                        @error('clavec')
                                            <div class="text-danger text-center">
                                                El campo clave catastral es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form form-group">
                                        <label for="propietario" class="form-label">Propietario:*</label>
                                        <input type="text" value="{{ str_replace('¥', 'Ñ', $item->Propietario) }}"
                                            id="propietario"
                                            class="form-control mb-2
                                                    @error('propietario')
                                                    border border-danger rounded-2
                                                    @enderror"
                                            name="propietario">
                                        @error('propietario')
                                            <div class="text-danger text-center">
                                                El campo propietario es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-4">
                                    <div class="md-form form-group">
                                        <label for="domicilio" class="form-label">Domicilio*</label>
                                        <input type="text" value="{{ $item->Domicilio }}" id="domicilio"
                                            class="form-control mb-2
                                                @error('domicilio')
                                                border border-danger rounded-2
                                                @enderror"
                                            name="domicilio">
                                        @error('domicilio')
                                            <div class="text-danger text-center">
                                                El campo domicilio es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-form form-group">
                                        <label for="seriem" class="form-label mb-2">Serie medidor:*</label>
                                        <input type="text"
                                            class="form-control mb-2
                                                @error('seriem')
                                                border border-danger rounded-2
                                                @enderror"
                                            id="seriem" name="seriem" value="{{ $item->SerieMedidor }}">
                                        @error('seriem')
                                            <div class="text-danger text-center">
                                                El campo serie medidor es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-form form-group">
                                        <label for="tipo_s" class="form-label mb-2">Tipo de servicio:*</label>
                                        <input type="text"
                                            class="form-control mb-2
                                                @error('tipo_s')
                                                border border-danger rounded-2
                                                @enderror"
                                            id="tipo_s" name="tipo_s" value="{{ $ts }}" readonly>
                                        @error('tipo_s')
                                            <div class="text-danger text-center">
                                                El campo servicio es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <label for="periodo" class="form-label mb-2">Periodo Facturado*</label>
                                    <div class="md-form form-group">
                                        <input type="text"
                                            class="form-control mb-2 text-center
                                                        @error('periodo')
                                                        border border-danger rounded-2
                                                        @enderror"
                                            id="periodo" name="periodo" value="{{ $periodo[0]->periodo }}">
                                        @error('periodo')
                                            <div class="text-danger text-center">
                                                El campo periodo es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-3">
                                    <div class="md-form form-group">
                                        <label for="razons" class="form-label mb-2">Razon social:*</label>
                                        <input type="text"
                                            class="form-control mb-2
                                                @error('razons')
                                                border border-danger rounded-2
                                                @enderror"
                                            id="razons" name="razons" value="{{ $giro }}">
                                        @error('razons')
                                            <div class="text-danger text-center">
                                                El campo razon social es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form form-group">
                                        <label for="fechad" class="form-label mb-2">Fecha de la determinación:*</label>
                                        <input type="date"
                                            class="form-control mb-2
                                                @error('fechad')
                                                border border-danger rounded-2
                                                @enderror"
                                            id="fechad" name="fechad" value="{{ old('fechad') }}">
                                        @error('fechad')
                                            <div class="text-danger text-center">
                                                El campo fecha determinación es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="p-2 rounded-4 mt-3" style=" background-color: #E8ECEF; border: inherit;">
                            <div class="text-white m-2 align-items-end" style="text-align:right;">
                                <span class="bg-success rounded-2 p-2"><img
                                        src="https://img.icons8.com/fluency/30/null/resume.png" />Resumen</span>
                            </div>
                            <table class="table table-hover table-sm table-dark my-2 mx-auto" style="width: 450px">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>Concepto
                                        </th>
                                        <th>Importe
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">
                                    <tr>
                                        <td>Corriente</td>
                                        <td>
                                            <input type="text" name="corriente" id="corriente" onchange="Suma()"
                                                class="form-control mb-2"
                                                value="${{ number_format($t_adeudo->sumaTarifas, 2) }}" readonly />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>IVA Corriente</td>
                                        <td>
                                            <input type="text" name="icorriente" id="icorriente"
                                                class="form-control mb-2" onchange="Suma()"
                                                value="${{ number_format($t_adeudo->saldoIvaCor, 2) }}" readonly />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Atraso</td>
                                        <td>
                                            <input type="text" name="atraso" id="atraso"
                                                class="form-control mb-2" onchange="Suma()"
                                                value="${{ number_format($t_adeudo->saldoAtraso, 2) }}" readonly />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rezago</td>
                                        <td>
                                            <input type="text" name="rezago" id="rezago"
                                                class="form-control mb-2" onchange="Suma()"
                                                value="${{ number_format($t_adeudo->saldoRezago, 2) }}" readonly />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Recargos Consumo</td>
                                        <td>
                                            <input type="text" name="r_consumo" id="r_consumo"
                                                class="form-control mb-2" onchange="Suma()"
                                                value="${{ number_format($t_adeudo->RecargosAcumulados, 2) }}" readonly />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Convenio De Agua</td>
                                        <td>
                                            <input type="text" name="c_agua" id="c_agua" onchange="Suma()"
                                                value="{{ old('c_agua') }}"
                                                class="form-control mb-2 
                                                @error('c_agua')
                                                border border-danger rounded-2
                                                @enderror" />
                                            @error('c_agua')
                                                <div class="text-danger text-center">
                                                    El campo convenio agua requerido.
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Recargos Convenio De Agua</td>
                                        <td>
                                            <input type="text" name="r_agua" id="r_agua" onchange="Suma()"
                                                value="{{ old('r_agua') }}"
                                                class="form-control mb-2 
                                                @error('r_agua')
                                                border border-danger rounded-2
                                                @enderror" />
                                            @error('r_agua')
                                                <div class="text-danger text-center">
                                                    El campo recargos convenio agua es requerido
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Convenio De Obra</td>
                                        <td>
                                            <input type="text" name="c_obra" id="c_obra"
                                                value="{{ old('c_obra') }}"
                                                class="form-control mb-2 
                                                @error('c_obra')
                                                border border-danger rounded-2
                                                @enderror"
                                                onchange="Suma()" />
                                            @error('c_obra')
                                                <div class="text-danger text-center">
                                                    El campo convenio obra es requerido
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Recargos Convenio De Obra</td>
                                        <td>
                                            <input type="text" name="r_obra" id="r_obra"
                                                value="{{ old('r_obra') }}"
                                                class="form-control mb-2 
                                                @error('r_obra')
                                                border border-danger rounded-2
                                                @enderror"
                                                onchange="Suma()" />
                                            @error('r_obra')
                                                <div class="text-danger text-center">
                                                    El campo recargos convenio obra es requerido
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gastos De Ejecución</td>
                                        <td>
                                            <input type="text" name="g_ejecucion" id="g_ejecucion"
                                                value="{{ old('g_ejecucion') }}"
                                                class="form-control mb-2  
                                                @error('g_ejecucion')
                                                border border-danger rounded-2
                                                @enderror"
                                                onchange="Suma()" />
                                            @error('g_ejecucion')
                                                <div class="text-danger text-center">
                                                    El campo gastos ejecución es requerido
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Otros Servicios</td>
                                        <td>
                                            <input type="text" name="o_servicios" id="o_servicios"
                                                value="{{ old('o_servicios') }}"
                                                class="form-control mb-2 
                                                @error('o_servicios')
                                                border border-danger rounded-2
                                                @enderror"
                                                onchange="Suma()" />
                                            @error('o_servicios')
                                                <div class="text-danger text-center">
                                                    El campo otros servicios es requerido
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Multas</td>
                                        <td>
                                            <input type="text" name="multas" id="multas"
                                                value="{{ old('multas') }}"
                                                class="form-control mb-2 
                                                @error('multas')
                                                border border-danger rounded-2
                                                @enderror"
                                                onchange="Suma()" />
                                            @error('multas')
                                                <div class="text-danger text-center">
                                                    El campo multas  es requerido
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gastos de Ejecucion</td>
                                        <td>
                                            <input type="text" name="gastos_ejecucion" id="gastos_ejecucion"
                                                value="{{ old('gastos_ejecucion') }}"
                                                class="form-control mb-2 
                                                @error('gastos_ejecucion')
                                                border border-danger rounded-2
                                                @enderror"
                                                onchange="Suma()" />
                                            @error('gastos_ejecucion')
                                                <div class="text-danger text-center">
                                                    El campo gastos ejecucion  es requerido
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Convenios Vencidos</td>
                                        <td>
                                            <input type="text" name="conv_vencido" id="conv_vencido"
                                                value="{{ old('conv_vencido') }}"
                                                class="form-control mb-2 
                                                @error('conv_vencido')
                                                border border-danger rounded-2
                                                @enderror"
                                                onchange="Suma()" />
                                            @error('conv_vencido')
                                                <div class="text-danger text-center">
                                                    El campo convenios vencidos es requerido
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Otros Gastos</td>
                                        <td>
                                            <input type="text" name="otros_gastos" id="otros_gastos"
                                                value="{{ old('otros_gastos') }}"
                                                class="form-control mb-2 
                                                @error('otros_gastos')
                                                border border-danger rounded-2
                                                @enderror"
                                                onchange="Suma()" />
                                            @error('otros_gastos')
                                                <div class="text-danger text-center">
                                                    El campo otros gastos es requerido
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Saldo Total</td>
                                        <td><input type="text" name="total" id="total" value="{{ old('total') }}"
                                                class="form-control mb-2  
                                                @error('total')
                                                border border-danger rounded-2
                                                @enderror" readonly />
                                                @error('total')
                                                <div class="text-danger text-center">
                                                    El campo total es requerido
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-2 rounded-4 mt-3" style=" background-color: #E8ECEF; border: inherit;">
                            <div class="text-white m-2 align-items-end" style="text-align:right;">
                                <span class="bg-success rounded-2 p-2"><img
                                        src="https://img.icons8.com/fluency/30/null/resume.png" />Resumen</span>
                            </div>
                            <table>
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
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    {{-- @foreach ($items as $item)
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
                                        </tr>
                                    @endforeach --}}
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
                                        Generar Determinación</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
            <hr>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/suma.js') }}"></script>
@endsection

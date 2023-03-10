@extends('layouts.index')
@section('titulo')
    Determinación
@endsection
@section('css')
    <link href="{{ asset('css/addInput.css') }}" rel="stylesheet">
@endsection
@section('contenido')
    <div class="container position-static">
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

                            <div class="col-md-4">
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

                            <div class="col-md-4">
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
                        </div>
                        <div class="row align-items-start form-row">
                            <div class="col-md-4">
                                <div class="md-form form-group">
                                    <label for="propietario" class="form-label">Propietario:*</label>
                                    <input type="text" value="{{ str_replace("¥", "Ñ",$item->Propietario)}}" id="propietario"
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
                            <div class="col-md-4">
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
                        <div class="row align-items-start form-row">
                            <div class="col-md-6">
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
                            <div class="col-md-6 ">
                                <label for="periodo" class="form-label mb-2">Periodo Facturado*</label>
                                <div class="md-form form-group">
                                    <input type="text"
                                        class="form-control mb-2 text-center
                                                    @error('periodo')
                                                    border border-danger rounded-2
                                                    @enderror"
                                        id="periodo" name="periodo" value="{{ $periodo[0]->periodo }}" readonly>
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
                                        id="razons" name="razons" value="">
                                    @error('razons')
                                        <div class="text-danger text-center">
                                            El campo razon social es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <div class="md-form form-group">
                                    <label for="suma_r" class="form-label mb-2">Suma de recargos:*</label>
                                    <input type="text"
                                        class="form-control mb-2
                                            @error('suma_r')
                                            border border-danger rounded-2
                                            @enderror"
                                        id="suma_r" name="suma_r" value="" disabled>
                                    @error('suma_r')
                                        <div class="text-danger text-center">
                                            El campo recargos es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="md-form form-group">
                                    <label for="total" class="form-label mb-2">Total a pagar:*</label>
                                    <input type="text"
                                        class="form-control mb-2
                                            @error('total')
                                            border border-danger rounded-2
                                            @enderror"
                                        id="total" name="total" value="" disabled>
                                    @error('total')
                                        <div class="text-danger text-center">
                                            El campo total es requerido
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
                                    <td>$</td>
                                </tr>
                                <tr>
                                    <td>IVA Corriente</td>
                                    <td>$</td>
                                </tr>
                                <tr>
                                    <td>Atraso</td>
                                    <td>$</td>
                                </tr>
                                <tr>
                                    <td>Rezago</td>
                                    <td>$</td>
                                </tr>
                                <tr>
                                    <td>Recargos Consumo</td>
                                    <td>$</td>
                                </tr>
                                <tr>
                                    <td>Convenio De Agua</td>
                                    <td>$</td>
                                </tr>
                                <tr>
                                    <td>Recargos Convenio De Agua</td>
                                    <td>$</td>
                                </tr>
                                <tr>
                                    <td>Convenio De Obra</td>
                                    <td>$</td>
                                </tr>
                                <tr>
                                    <td>Recargos Convenio De Obra</td>
                                    <td>$</td>
                                </tr>
                                <tr>
                                    <td>Recargos Convenio De Obra</td>
                                    <td>$</td>
                                </tr>
                                <tr>
                                    <td>Gastos De Ejecución</td>
                                    <td>$</td>
                                </tr>
                                <tr>
                                    <td>Otros Servicios</td>
                                    <td>$</td>
                                </tr>
                                <tr>
                                    <td>Saldo Total</td>
                                    <td>$</td>
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
                                    Generar Determinación</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </form>
        </div>
        <hr>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/addInput.js') }}"></script>
@endsection

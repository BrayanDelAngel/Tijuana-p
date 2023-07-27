@extends('layouts.index')
@section('titulo')
    Requerimiento
@endsection
@section('css')
    <link href="{{ asset('css/addInput.css') }}" rel="stylesheet">
@endsection
@section('contenido')
    <div class="container position-static">
        <div class="mt-4">
            <h2 style="text-shadow: 0px 0px 2px #717171;"><img src="https://img.icons8.com/color/47/null/signature.png" />
                Formato de Requerimiento</h2>
            <h4 style="text-shadow: 0px 0px 2px #717171;">Tijuana</h4>
        </div>
        <hr>
        <div class="p-3 mx-auto">
            <form action="{{ route('guardar-requerimiento') }}" method="post" novalidate>
                @csrf

                @foreach ($date as $item)
                    <div class="row">
                        <input type="hidden" name="id_d" value="{{ $item->id }}">
                        <div class="p-2 rounded-4 col-md-7" style=" background-color: #E8ECEF; border: inherit;">
                            <div class="text-white m-2 align-items-end" style="text-align:right;">
                                <span class="bg-success rounded-2 p-2"><img
                                        src="https://img.icons8.com/fluency/30/000000/user-manual.png" />Datos
                                    Generales</span>
                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-3">
                                    <div class="md-form form-group">
                                        <label for="ncredito" class="form-label">Número de Credito:*</label>
                                        <input type="text" id="ncredito"
                                            class="form-control mb-2 
                                            @error('ncredito')
                                            border border-danger rounded-2
                                            @enderror"
                                            name="ncredito" value="{{ $item->folio }}" placeholder="Número de Credito"
                                            disabled>
                                        @error('ncredito')
                                            <div class="text-danger text-center">
                                                El campo número crédito es requerido.
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
                                                @if ($message == 'The oficio has already been taken.')
                                                    El campo oficio ya ha sido tomado.
                                                @else
                                                    El campo oficio es requerido
                                                @endif
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
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

                            </div>

                            <div class="row align-items-start form-row">
                                <div class="col-md-3">
                                    <div class="md-form form-group">
                                        <label for="clavec" class="form-label">Clave Castastral:*</label>
                                        <input type="text" class="form-control mb-2" id="clavec" name="clavec"
                                            value="{{ $item->Clave }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="propietario" class="form-label">Propietario:*</label>
                                        <input type="text" value="{{ $item->Propietario }}" id="contribuyente"
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

                                <div class="col-md-3">
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
                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-10">
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


                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-6 ">
                                    <label for="periodo" class="form-label mb-2">Periodo Facturado*</label>
                                    <div class="md-form form-group">
                                        <input type="text"
                                            class="form-control mb-2 text-center
                                                    @error('periodo')
                                                    border border-danger rounded-2
                                                    @enderror"
                                            id="periodo" name="periodo" value="{{ $item->periodo }}" disabled>
                                        @error('periodo')
                                            <div class="text-danger text-center">
                                                El campo periodo es requerido
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
                                            id="tservicio" name="tservicio" value="{{ $ts }}" readonly>
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
                                        <label for="remision" class="form-label mb-2">Fecha de la remisión del
                                            credito fiscal:*</label>
                                        <input type="date"
                                            class="form-control mb-2
                                            @error('remision')
                                            border border-danger rounded-2
                                            @enderror"
                                            id="remision" name="remision" value="{{ $item->fechad }}" disabled>
                                        @error('remision')
                                            <div class="text-danger text-center">
                                                El campo remisión es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="emision" class="form-label mb-2">Fecha del
                                            requerimiento:*</label>
                                        <input type="date"
                                            class="form-control mb-2
                                            @error('emision')
                                            border border-danger rounded-2
                                            @enderror"
                                            id="emision" name="emision" value="{{ old('emision') }}">
                                        @error('emision')
                                            <div class="text-danger text-center">
                                                El campo emision es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row align-items-start form-row">
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <label for="notificacion" class="form-label mb-2">Fecha notificación de la
                                            determinación:*</label>
                                        <input type="date"
                                            class="form-control mb-2
                                            @error('notificacion')
                                            border border-danger rounded-2
                                            @enderror"
                                            id="notificacion" name="notificacion" value="{{ old('notificacion') }}">
                                        @error('notificacion')
                                            <div class="text-danger text-center">
                                                El campo notificación es requerido
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
                                            id="sobrerecaudador" name="sobrerecaudador" value="ELVIA ROSARIO LUQUE BAEZ">
                                        @error('sobrerecaudador')
                                            <div class="text-danger text-center">
                                                El campo sobrerecaudador es requerido
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

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
                                        style="width: 5%; position: absolute; margin-left: 17%" type="button">
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
                                    <th>DESCRIPCIÓN DE
                                        CONCEPTO
                                    </th>
                                    <th>ADEUDO CONSUMO
                                        DE AGUA Y ALCANTARILLADO
                                    </th>
                                    <th>RECARGOS
                                    </th>
                                    <th>MULTAS</th>
                                    <th>GASTOS
                                        DE EJECUCIÓN
                                    </th>
                                    <th>SUSP. DEL SERVICIO
                                        OTROS GASTOS
                                    </th>
                                    <th>CONV.
                                        VENCIDOS
                                    </th>
                                    <th>IMPORTE TOTAL DEL ADEUDO</th>
                                </tr>
                            </thead>
                            <tbody class="table-light text-center">

                                <tr>
                                    <td>Totales</td>
                                    <td>${{ number_format($t_adeudo_t->totalPeriodo, 2) }}</td>
                                    <td>${{ number_format($t_adeudo_t->RecargosAcumulados, 2) }}</td>
                                    <td>${{ number_format($multas, 2) }}</td>
                                    <td>${{ number_format($gastos_ejecucion, 2) }}</td>
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
                    </div>
                @endforeach
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
            </form>
        </div>
        <hr>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/addInput.js') }}"></script>
@endsection

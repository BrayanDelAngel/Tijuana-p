@extends('layouts.index')
@section('titulo')
    Mandamiento
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
            <form action="" method="post" novalidate>
                @csrf
                <div class="p-2 rounded-4" style=" background-color: #E8ECEF; border: inherit;">
                    <div class="text-white m-2 align-items-end" style="text-align:right;">
                        <span class="bg-success rounded-2 p-2"><img
                                src="https://img.icons8.com/fluency/30/000000/user-manual.png" />Datos Generales</span>
                    </div>
                    <div class="row align-items-start form-row">
                        <div class="col-md-2">
                            <div class="md-form form-group">
                                <label for="folio" class="form-label">Folio:*</label>
                                <input type="text" id="folio"
                                    class="form-control mb-2 
                                        @error('folio')
                                        border border-danger rounded-2
                                        @enderror"
                                    name="folio" value="{{ old('folio') }}" placeholder="Folio">
                                @error('folio')
                                    <div class="text-danger text-center">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="creditof" class="form-label">Credito fiscal:*</label>
                                <div class="input-group mb-6">
                                    <input type="text" class="form-control mb-2" value="TP/PAE/" disabled>
                                    <input type="text" value="{{ old('creditof') }}" id="creditof"
                                        class="form-control mb-2
                                            @error('creditof')
                                            border border-danger rounded-2
                                            @enderror"
                                        name="creditof">
                                    @error('creditof')
                                        <div class="text-danger text-center">
                                            @if ($message == 'El campo creditof ya ha sido tomado.')
                                                El campo credito fiscal ya ha sido tomado.
                                            @else
                                                El campo credito fiscal es requerido
                                            @endif
                                        </div>
                                    @enderror
                                    <input type="text" class="form-control mb-2" value="/{{ date('Y') }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="contribuyente" class="form-label">Contribuyente:*</label>
                                <input type="text" value="{{ old('contribuyente') }}" id="contribuyente"
                                    class="form-control mb-2
                                            @error('contribuyente')
                                            border border-danger rounded-2
                                            @enderror"
                                    name="contribuyente" readonly>
                                @error('contribuyente')
                                    <div class="text-danger text-center">
                                        El campo contribuyente es requerido
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="md-form form-group">
                                <label for="clavec" class="form-label">Clave Castastral:*</label>
                                <input type="text" class="form-control mb-2" id="clavec" name="clavec"
                                    value="{{ old('clavec') }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-start form-row">
                        <div class="col-md-8">
                            <div class="md-form form-group">
                                <label for="domicilio" class="form-label">Domicilio*</label>
                                <input type="text" value="{{ old('domicilio') }}" id="domicilio"
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
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="emision" class="form-label mb-2">Fecha emisión de
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
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="cuenta" class="form-label mb-2">Cuenta:*</label>
                                <input type="text" value="{{ old('cuenta') }}" readonly
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
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="tservicio" class="form-label mb-2">Tipo de servicio:*</label>
                                <input type="text"
                                    class="form-control mb-2
                                        @error('tservicio')
                                        border border-danger rounded-2
                                        @enderror"
                                    id="tservicio" name="tservicio" value="{{ old('tservicio') }}">
                                @error('tservicio')
                                    <div class="text-danger text-center">
                                        El campo servicio es requerido
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="serie" class="form-label mb-2">Serie medidor:*</label>
                                <input type="text"
                                    class="form-control mb-2
                                        @error('serie')
                                        border border-danger rounded-2
                                        @enderror"
                                    id="serie" name="serie" value="{{ old('serie') }}">
                                @error('serie')
                                    <div class="text-danger text-center">
                                        El campo serie es requerido
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-start form-row">
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="remision" class="form-label mb-2">Fecha remisión de
                                    requerimiento:*</label>
                                <input type="date"
                                    class="form-control mb-2
                                        @error('remision')
                                        border border-danger rounded-2
                                        @enderror"
                                    id="remision" name="remision" value="{{ old('remision') }}">
                                @error('remision')
                                    <div class="text-danger text-center">
                                        El campo remision es requerido
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
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
                                <td>$</td>
                                <td>$</td>
                                <td>$</td>
                                <td>$</td>
                                <td>$</td>
                                <td>$</td>
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
                                Generar Requerimiento</button>
                        </div>
                    </div>
                </div>
                <form>
        </div>
        <hr>
    </div>
@endsection

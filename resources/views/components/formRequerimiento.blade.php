@extends('layouts.index')
@section('titulo')
    Requerimiento
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
                </div>
                {{-- <div class="p-2 rounded-4 mt-4" style=" background-color: #E8ECEF; border: inherit;">
                        <div class="text-white m-2 align-items-end" style="text-align:right;">
                            <span class="bg-primary rounded-2 p-2"><img
                                    src="https://img.icons8.com/fluency/30/null/sell-property.png" />Valores
                                Catastrales</span>
                        </div>
                        <div class="row align-items-start form-row">
                            <div class="col-md-3">
                                <div class="md-form form-group">
                                    <label for="superficie" class="form-label">Superficie de Terreno:*</label>
                                    <input value="{{ $item->superficie }}" type="text"
                                        class="form-control mb-2
                                    @error('superficie')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="superficie" name="superficie" disabled>
                                    @error('superficie')
                                        <div class="text-danger text-center">
                                            El campo superfice terreno es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="md-form form-group">
                                    <label for="metrosc" class="form-label">Superficie de Construccion:*</label>
                                    <input value="{{ $item->valorc }}" type="text"
                                        class="form-control mb-2
                                    @error('metrosc')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="metrosc" name="metrosc" disabled>
                                    @error('metrosc')
                                        <div class="text-danger text-center">
                                            El campo metros construccion es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="md-form form-group">
                                    <label for="valorm2" class="form-label">Valor Catastral:*</label>
                                    <input type="text" value="{{ $item->valorc }}"
                                        class="form-control  mb-2
                                    @error('valorm2')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="valorm2" name="valorm2" disabled>
                                    @error('valorm2')
                                        <div class="text-danger text-center">
                                            El campo valor catastral es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="md-form form-group">
                                    <label for="tasa" class="form-label">Tasa:*</label>
                                    <input value="{{ number_format($item->tasa, 2) }}" type="text"
                                        class="form-control  mb-2
                                    @error('tasa')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="tasa" name="tasa" disabled>
                                    @error('tasa')
                                        <div class="text-danger text-center">
                                            El campo tasa es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="md-form form-group">
                                    <label for="tipou" class="form-label">Tipo de uso:*</label>
                                    <input value="{{ $item->uso }}" type="text"
                                        class="form-control  mb-2
                                    @error('tipou')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="tipou" name="tipou" disabled>
                                    @error('tipou')
                                        <div class="text-danger text-center">
                                            El campo tipo uso es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-start form-row">
                            <div class="col-md-5">
                                <div class="md-form form-group">
                                    <label for="recaudador" class="form-label">Recaudador:*</label>
                                    <input type="text" value="{{ $item->recaudador }}"
                                        class="form-control mb-2
                                    @error('recaudador')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="recaudador" name="recaudador">
                                    @error('recaudador')
                                        <div class="text-danger text-center">
                                            El campo recaudador es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form form-group">
                                    <label for="ejecutor1" class="form-label">Ejecutor 1:*</label>
                                    <input type="text"
                                        class="form-control mb-2
                                    @error('ejecutor1')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="ejecutor1" name="ejecutor1" value="JESUS ALBERTO GONZALEZ REYES">
                                    @error('ejecutor1')
                                        <div class="text-danger text-center">
                                            El campo ejecutor 1 es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="md-form form-group">
                                    <label for="nombramiento1" class="form-label">Nombramiento 1:*</label>
                                    <input type="text"
                                        class="form-control mb-2
                                    @error('nombramiento1')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="nombramiento1" name="nombramiento1" value="RR-27">
                                    @error('nombramiento1')
                                        <div class="text-danger text-center">
                                            El campo nombramiento 1 es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-start form-row">
                            <div class="col-md-4">
                                <div class="md-form form-group">
                                    <label for="ejecutor2" class="form-label">Ejecutor 2:*</label>
                                    <input type="text"
                                        class="form-control mb-2
                                    @error('ejecutor2')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="ejecutor2" name="ejecutor2" value="KAREN GUADALUPE ALBA VILLEGAS">
                                    @error('ejecutor2')
                                        <div class="text-danger text-center">
                                            El campo ejecutor 2 es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="md-form form-group">
                                    <label for="nombramiento2" class="form-label">Nombramiento 2:*</label>
                                    <input type="text"
                                        class="form-control mb-2
                                    @error('nombramiento2')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="nombramiento2" name="nombramiento2" value="RR-25">
                                    @error('nombramiento2')
                                        <div class="text-danger text-center">
                                            El campo nombramiento 2 es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-form form-group">
                                    <label for="ejecutor3" class="form-label">Ejecutor 3:*</label>
                                    <input type="text"
                                        class="form-control mb-2
                                    @error('ejecutor3')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="ejecutor3" name="ejecutor3" value="RAUL MAYORAL FLORES">
                                    @error('ejecutor3')
                                        <div class="text-danger text-center">
                                            El campo ejecutor 3 es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="md-form form-group">
                                    <label for="nombramiento3" class="form-label">Nombramiento 3:*</label>
                                    <input type="text"
                                        class="form-control mb-2
                                    @error('nombramiento3')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="nombramiento3" name="nombramiento3" value="RR-21">
                                    @error('nombramiento3')
                                        <div class="text-danger text-center">
                                            El campo nombramiento 3 es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-start form-row">
                            <div class="col-md-4">
                                <div class="md-form form-group">
                                    <label for="ejercicios" class="form-label">Ejercicios Fiscales*</label>
                                    <input type="text" value="{{ $item->ef }}"
                                        class="form-control mb-2
                                    @error('ejercicios')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="ejercicios" name="ejercicios" disabled>
                                    @error('ejercicios')
                                        <div class="text-danger text-center">
                                            El campo ejercicios fiscales es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="md-form form-group">
                                    <label for="cantidad" class="form-label">Cantidad de impuesto predial*</label>
                                    <input type="text" value="$ {{ number_format($item->total, 2) }}" disabled
                                        class="form-control mb-2
                                    @error('cantidad')
                                    border border-danger rounded-2
                                    @enderror"
                                        id="cantidad" name="cantidad">
                                    @error('cantidad')
                                        <div class="text-danger text-center">
                                            El campo cantidad es requerido
                                        </div>
                                    @enderror
                                </div>
                            </div>
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
                                Generar Requerimiento</button>
                        </div>
                    </div>
                </div>
                <form>
        </div>
        <hr>
    </div>
@endsection

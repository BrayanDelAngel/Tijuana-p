@extends('layouts.index')
@section('titulo')
    Tarifas
@endsection
@section('contenido')
    <div class="container position-static">
        <div class="mt-4">
            <h2 style="text-shadow: 0px 0px 2px #717171;"><img src="https://img.icons8.com/color/47/null/signature.png" />
                Tarifas e Tijuana Agua</h2>
            <h4 style="text-shadow: 0px 0px 2px #717171;">Tijuana</h4>
        </div>
        <hr>
        <div class="p-3 mx-auto">
            <form action="" method="post" novalidate>
                @csrf
                <div class="p-2 rounded-4 col-md-12" style=" background-color: #E8ECEF; border: inherit;">
                    <div class="text-white m-2 align-items-end" style="text-align:right;">
                        <span class="bg-success rounded-2 p-2"><img
                                src="https://img.icons8.com/fluency/30/null/withdrawal.png" />Agregar tarifa</span>
                    </div>
                    <div class="row align-items-start form-row">
                        <div class="col-md-4">
                            <div class="md-form form-group">
                                <label for="propietario" class="form-label">Propietario:*</label>
                                <input type="text" value="" id="propietario"
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
                                    id="seriem" name="seriem" value="">
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
                                    id="fechad" name="fechad" value="">
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
                        <span class="bg-primary rounded-2 p-2"><img
                                src="https://img.icons8.com/fluency/30/null/money.png" />Resumen</span>
                    </div>
                    <table class="table table-hover table-sm table-dark my-2 mx-auto text-center" style="width: 450px;">
                        <thead class="table-dark text-center">
                            <tr>
                                <th colspan="2">
                                    Periodo
                                </th>
                                <th colspan="2">
                                    Domestico
                                </th>
                                <th colspan="2">
                                    No Domestico
                                </th>
                                <th rowspan="2">
                                    Acción
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Año
                                </th>
                                <th>
                                    Mes
                                </th>
                                <th>
                                    Factor
                                </th>
                                <th>
                                    Mes
                                </th>
                                <th>
                                    Factor
                                </th>
                                <th>
                                    Mes
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                        @foreach ($tarifas as $item)
                            <tr>
                                <td>{{$item->anio}}</td>
                                <td>{{$item->bim}}</td>
                                <td>{{number_format($item->factor,2)}}</td>
                                <td>{{number_format($item->tarifa,2)}}</td>
                                <td>{{number_format($item->factor2,2)}}</td>
                                <td>{{number_format($item->tarifa2,2)}}</td>
                                <td>accion</td>
                            </tr>
                            @endforeach
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
            </form>
        </div>
        <hr>
    </div>
@endsection
@section('js')
@endsection

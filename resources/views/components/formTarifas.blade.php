@extends('layouts.index')
@section('titulo')
    Tarifas
@endsection
@section('contenido')
    @if (session('success_tarifa'))
        {{-- Muestra de sweetalert en caso de error de petición --}}
        <script src="{{ asset('js/sweetAlert/successRegistrerTarifa.js') }}"></script>
    @endif
    @if (session('success_Updatetarifa'))
        {{-- Muestra de sweetalert en caso de error de petición --}}
        <script src="{{ asset('js/sweetAlert/successUpdateTarifa.js') }}"></script>
    @endif
    @if (session('errorAgregar'))
        {{-- Muestra de sweetalert en caso de error de petición --}}
        <script src="{{ asset('js/sweetAlert/errorAddTarifa.js') }}"></script>
    @endif
    @if (session('errorActualizar'))
        {{-- Muestra de sweetalert en caso de error de petición --}}
        <script src="{{ asset('js/sweetAlert/errorUpdateTarifa.js') }}"></script>
    @endif
    @if (session('errorUniqueTarifa'))
        {{-- Muestra de sweetalert en caso de error de petición --}}
        <script src="{{ asset('js/sweetAlert/errorUniqueTarifa.js') }}"></script>
    @endif
    <div class="container position-static">
        <div class="mt-4">
            <h2 style="text-shadow: 0px 0px 2px #717171;">
                <img src="https://img.icons8.com/color/47/null/signature.png" />
                Tarifas e Tijuana Agua
            </h2>
            <h4 style="text-shadow: 0px 0px 2px #717171;">Tijuana</h4>
        </div>
        <hr>
        <div class="p-3 mx-auto">
            <form action="" method="post" novalidate>
                @csrf
                <div class="p-2 rounded-4 mt-3" style=" background-color: #E8ECEF; border: inherit;">
                    <div class="text-white m-2 align-items-end" style="text-align:right;">
                        <span class="bg-primary rounded-2 p-2"><img
                                src="https://img.icons8.com/fluency/30/null/money.png" />Resumen</span>
                    </div>
                    <div class="d-flex" style="margin-left: 85%">
                        <button type="button" id="btnmodal" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModalA">
                            <img src="https://img.icons8.com/fluency/30/null/add-dollar.png" />
                            Agregar
                        </button>
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
                                    <td>{{ $item->anio }}</td>
                                    <td>{{ $mes[$item->bim - 1] }}</td>
                                    <td>{{ number_format($item->factor, 2) }}</td>
                                    <td>{{ number_format($item->tarifa, 2) }}</td>
                                    <td>{{ number_format($item->factor2, 2) }}</td>
                                    <td>{{ number_format($item->tarifa2, 2) }}</td>
                                    <td>
                                        <button type="button" id="btnmodal" class="btn btn-light btn-sm"
                                            data-bs-toggle="modal" data-anio="{{ $item->anio }}"
                                            data-bim="{{ $item->bim }}"
                                            data-factor="{{ number_format($item->factor, 2) }}"
                                            data-tarifa="{{ number_format($item->tarifa, 2) }}"
                                            data-factor2="{{ number_format($item->factor2, 2) }}"
                                            data-tarifa2="{{ number_format($item->tarifa2, 2) }}"
                                            data-bs-target="#exampleModal">
                                            <img src="https://img.icons8.com/fluency/30/null/edit-file.png" />
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex" style="margin-left: 25%;margin-right: 25%">
                        {{ $tarifas->links() }}
                    </div>
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
    {{-- Modal de la tarifa Agregar --}}
    <div class="modal fade" id="exampleModalA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tarifa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('guardar-tarifas') }}" method="post" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="anioA" class="form-label">Año</label>
                            <input type="text"
                                class="form-control 
                            @error('anioA')
                            border border-danger rounded-2
                            @enderror"
                                id="anioA" name="anioA">
                            @error('anioA')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mesA" class="form-label">Mes</label>
                            <select name="mesA" id="mesA"
                                class="form-select 
                            @error('mesA')
                            border border-danger rounded-2
                            @enderror"
                                aria-label="Default select example">
                                <option selected value="">Meses</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                            @error('mesA')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tarifa1A" class="form-label">Tarifa Domestico</label>
                            <input type="text"
                                class="form-control 
                            @error('tarifa1A')
                            border border-danger rounded-2
                            @enderror"
                                id="tarifa1A" name="tarifa1A">
                            @error('tarifa1A')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="factor1A" class="form-label">Factor Domestico</label>
                            <input type="text"
                                class="form-control 
                            @error('factor1A')
                            border border-danger rounded-2
                            @enderror"
                                id="factor1A" name="factor1A">
                            @error('factor1A')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tarifa2A" class="form-label">Tarifa No Domestico</label>
                            <input type="text"
                                class="form-control 
                            @error('tarifa2A')
                            border border-danger rounded-2
                            @enderror"
                                id="tarifa2A" name="tarifa2A">
                            @error('tarifa2A')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="factor2A" class="form-label">Factor No Domestico</label>
                            <input type="text"
                                class="form-control  
                            @error('factor2A')
                            border border-danger rounded-2
                            @enderror"
                                id="factor2A" name="factor2A">
                            @error('factor2A')
                                <div class="text-danger text-center">
                                     {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><img
                                src="https://img.icons8.com/fluency/24/null/cancel.png" />
                            Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal de la tarifa Actualizar --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tarifa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('editar-tarifas') }}" method="post" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="anio" class="form-label">Año</label>
                            <input type="text"
                                class="form-control 
                            @error('anio')
                            border border-danger rounded-2
                            @enderror"
                                id="anio" name="anio" readonly>
                            @error('anio')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mes" class="form-label">Mes</label>
                            <input type="text"
                                class="form-control 
                            @error('mes')
                            border border-danger rounded-2
                            @enderror"
                                id="mes" name="mes" readonly>
                            @error('mes')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tarifa1" class="form-label">Tarifa Domestico</label>
                            <input type="text"
                                class="form-control 
                            @error('tarifa1')
                            border border-danger rounded-2
                            @enderror"
                                id="tarifa1" name="tarifa1">
                            @error('tarifa1')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="factor1" class="form-label">Factor Domestico</label>
                            <input type="text"
                                class="form-control 
                            @error('factor1')
                            border border-danger rounded-2
                            @enderror"
                                id="factor1" name="factor1">
                            @error('factor1')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tarifa2" class="form-label">Tarifa No Domestico</label>
                            <input type="text"
                                class="form-control 
                            @error('tarifa2')
                            border border-danger rounded-2
                            @enderror"
                                id="tarifa2" name="tarifa2">
                            @error('tarifa2')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="factor2" class="form-label">Factor No Domestico</label>
                            <input type="text"
                                class="form-control  
                            @error('factor2')
                            border border-danger rounded-2
                            @enderror"
                                id="factor2" name="factor2">
                            @error('factor2')
                                <div class="text-danger text-center">
                                     {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><img
                                src="https://img.icons8.com/fluency/24/null/cancel.png" />
                            Cancelar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection
@section('js')
    {{-- Carga del modal con datos --}}
    <script src="{{ asset('js/modalPredial.js') }}"></script>
@endsection

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
                Tarifa de Tijuana Agua
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
                                src="https://img.icons8.com/fluency/30/null/money.png" />Tabla de tarifa</span>
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
                                <th >
                                    Año
                                </th>
                                <th>
                                    Mes
                                </th>
                                <th>
                                    Tarifa Domestico
                                </th>
                                <th>
                                    Tarifa Comercial
                                </th>
                                <th>
                                    Acción
                                </th>
                        </thead>
                        <tbody class="table-light">
                            @foreach ($tarifas as $item)
                                <tr>
                                    <td>{{ $item->anio }}</td>
                                    <td>{{ $mes[$item->bim - 1] }}</td>
                                    <td>{{ number_format($item->tarifa,2) }}</td>
                                    <td>{{ number_format($item->tarifa2,2) }}</td>
                                    <td>  
                                        <button type="button" class="btn btn-secondary btn-sm" id="btnmodal"
                                        data-bs-toggle="modal"
                                        data-anio="{{ $item->anio }}"
                                        data-mes="{{ $mes[$item->bim - 1] }}"
                                        data-tarifa="{{ number_format($item->tarifa,2)}}"
                                        data-tarifa2="{{ number_format($item->tarifa2,2)}}"
                                        data-bs-target="#exampleModalM">
                                            <img src="https://img.icons8.com/fluency/18/null/edit.png"/> 
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
                    <h5 class="modal-title" id="exampleModalLabel">INCP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('guardar-tarifa') }}" method="post" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="anioA" class="form-label">Año</label>
                            <input type="text" value="{{$anio_agregar}}" readonly
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
                            <input type="text" value="{{$mes[$mes_agregar-1]}}" readonly
                                class="form-control 
                            @error('mesA')
                            border border-danger rounded-2
                            @enderror"
                                id="mesA" name="mesA">
                            @error('mesA')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="tarifa" class="form-label">Tarifa Domestico</label>
                            <input type="text"
                                class="form-control 
                            @error('tarifa')
                            border border-danger rounded-2
                            @enderror"
                                id="tarifa" name="tarifa">
                            @error('tarifa')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tarifa2" class="form-label">Tarifa Comercial</label>
                            <input type="text"
                                class="form-control 
                            @error('tarifa2')
                            border border-danger rounded-2
                            @enderror"
                                id="tarifa2" name="tarifa2">
                            @error('tarifa')
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
    {{-- Modal de la tarifa modificar --}}
    <div class="modal fade" id="exampleModalM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tarifa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('modificar-tarifa') }}" method="post" novalidate>
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="anioM" class="form-label">Año</label>
                            <input type="text" value="{{$anio_agregar}}" readonly
                                class="form-control 
                            @error('anioM')
                            border border-danger rounded-2
                            @enderror"
                                id="anioM" name="anioM">
                            @error('anioM')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mesM" class="form-label">Mes</label>
                            <input type="text" value="{{$mes[$mes_agregar-1]}}" readonly
                                class="form-control 
                            @error('mesM')
                            border border-danger rounded-2
                            @enderror"
                                id="mesM" name="mesM">
                            @error('mesM')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tarifaM" class="form-label">Tarifa Domestico</label>
                            <input type="text"
                                class="form-control 
                            @error('tarifaM')
                            border border-danger rounded-2
                            @enderror"
                                id="tarifaM" name="tarifaM">
                            @error('tarifaM')
                                <div class="text-danger text-center">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tarifaM2" class="form-label">Tarifa Comercial</label>
                            <input type="text"
                                class="form-control 
                            @error('tarifaM2')
                            border border-danger rounded-2
                            @enderror"
                                id="tarifaM2" name="tarifaM2">
                            @error('tarifaM2')
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
                        <button type="submit" class="btn btn-primary">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  
@endsection
@section('js')
    {{-- Carga del modal con datos --}}
    <script src="{{ asset('js/modalTarifa.js') }}"></script>
@endsection

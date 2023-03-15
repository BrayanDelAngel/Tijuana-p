@extends('layouts.dashboard')
@section('titulo')
Personal
@endsection
@section('contenido')
<div class="p-6">
    @if (session('edit'))
    
    <script>
        (async () => {	
            const { value: personal,x } = await Swal.fire({
            title: '{{session('edit')}}',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Actualizar',
            html:
                '<input  type="text" value="{{ Session::get('personal') }}" id="personal" name="personal" class="swal2-input">'+
                `
    <select class="uppercase items-center w-full py-2 px-3 text-gray-600 text-sm mb-0.5 focus:border-transparent focus:outline-none focus:ring-2 focus:border-blue-sce rounded-lg shadow border" 
    id="lista" data-style="btn-warning" data-live-search="true" >
   
  
    <option value="0" hidden selected>{{ Session::get('opcion') }}</option>
    
    @foreach ($lugares as $e)
                
                <option value="{{$e->id_e_o}}">{{$e->descripcion}}</option>
                
                
                
    @endforeach
    </select>                   
    `,
            
              
            preConfirm: () => {
                return [
                document.getElementById('personal').value,
                ]
            }
            }).then((result) => {
              if (result.isConfirmed) {
                const personal=document.getElementById('personal').value
                const x=document.getElementById('lista').value
                if(personal!=''){
                    
                    var url="{{route('update_personal',['personal' => 'temp','id_tipo'=>'tempp','id_e_o'=>'temppp'])}}";
                    url=url.replace('temp',personal);
                    url=url.replace('temppp',x);
                    url=url.replace('tempp',{{ Session::get('id_tipo') }});
                    
                  
                    window.location.href=url;
                }
                else{
                    return[ Swal.fire({
                         icon: 'error',
                         title: 'Se requiere un nombre',
                         showConfirmButton: false,
                         timer: 5000
                         })]
                }
                
              }
            })
            })()
    </script>
    @endif
    @if (session('success-actualizar'))
    <script src="{{ asset('js/sweetalert/actualizar-success.js') }}"></script>
    @endif
    @if (session('error-actualizar'))
    <script src="{{ asset('js/sweetalert/actualizar-error.js') }}"></script>
    @endif
    @if (session('success-registrar'))
    <script src="{{ asset('js/sweetalert/registrar-success.js') }}"></script>
    @endif
    @if (session('error-registrar'))
    <script src="{{ asset('js/sweetalert/registrar-error.js') }}"></script>
    @endif
    <div class="items-center justify-center left-32">
        <h1 class="text-gray-600 text-base md:text-xl font-bold mb-2 text-center">Tipos de empleados </h1>
    </div>
    <div class="flex pb-1 w-full ">
        <form class="px-5 pt-5 md:flex flex-row w-full gap-4" action="{{route('add_staff')}}" method="post" novalidate>
            @csrf
            <div class="flex-row w-full">
                <label class="block w-full uppercase text-gray-600 text-sm font-bold mb-1" for="tipo_personal">
                Personal
                </label>
                <input name="descripcion" id="descripcion" type="text" placeholder="Descripción" class="uppercase shadow appearance-none border focus:border-transparent focus:outline-none focus:ring-2 focus:border-blue-sce rounded-lg w-full py-2 px-3 text-gray-600 mb-1
                    @error('descripcion')
                      border-red-500
                    @enderror" value="{{old('descripcion')}}">
                @error('descripcion')
                <p class="bg-red-500 text-white rounded-lg text-xs p-1 text-center">
                  El campo descripción es requerido.
                </p>
                @enderror
            </div>
            <div class="flex-row w-full">
                <label class="block w-full uppercase text-gray-600 text-sm font-bold mb-1" for="tipo_personal">
                    Lugar de Expediente
                </label>
                <select name="id_e_o" class="items-center w-full p-3 uppercase text-gray-600 text-sm mb-1 focus:border-transparent focus:outline-none focus:ring-2 focus:border-blue-sce rounded-lg shadow border"
                    @error('id_e_o')
                    border-red-500
                    @enderror" value="{{old('id_e_o')}}">
        
                    @error('id_e_o')
                    <p class="bg-red-500 text-white rounded-lg text-xs p-1 text-center">
                      {{$message}}
                    </p>
                    @enderror
                    <option value="" hidden selected>Lugar</option>
                    @foreach ($lugares as $lugar)
                      <option value="{{$lugar->id_e_o}}">{{$lugar->descripcion}}</option>
                    @endforeach
                </select>
            </div>
            <div  class="flex-row mt-2 mb-1 h-12">
                <button class="flex justify-center text-center items-center gap-4 mx-auto w-full bg-orange-sce text-sm md:text-lg  py-1 px-4 rounded-xl hover:bg-orange-sce hover:-translate-y-1 transition-all duration-500 text-white font-semibold cursor-pointer">
                    Agregar
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 stroke-[#fff] cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
    <div id="table-employee" class="overflow-y-auto h-80">
        <!--hidden md:block-->
        <table class="table-auto border shadow-lg w-full  table">
            <thead class="bg-[#f9a022] opacity-80">
                <tr>
                    <th class="font-bold p-2 border-b text-left">No.</th>
                    <th class="font-bold p-2 border-b text-left">Tipo empleado</th>
                    <th class="font-bold p-2 border-b text-left">Lugar expediente</th>
                    <th class="font-bold p-2 border-b text-left">Acción</th>
                </tr>
            </thead>
            <tbody class="">
                @forelse ($sql as $sq)
                <tr>
                    <td class="p-2 border-b text-gray-600 text-left text-sm" data-label="No.">
                        {{$contador+=1}}</td>
                    <td class="p-2 border-b text-gray-600 text-left text-sm" data-label="Tipo empleado">{{$sq->tipo}}</td>
                    <td class="p-2 border-b text-gray-600 text-left text-sm" data-label="Lugar expediente">{{$sq->lugar}}</td>
                    <td class="p-2 border-b text-gray-600 text-left text-sm" data-label="Acción">
                        <div class="flex items-center md:items-end">
                            
                            <a data-title="Editar tipo personal" href="{{route('edit_personal',['id_tipo'=>$sq->id_tipo])}}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 stroke-[#762f8b] cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="p-2 border-b text-left text-sm" colspan="4">
                        <p class="p-2 border-b text-center text-sm text-gray-600"> No hay empleados a mostrar</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="flex justify-center mt-2">
        {{$sql->links()}}
    </div>
    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endpush
</div>
@endsection
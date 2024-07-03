@extends('../layout/' . $layout)

@section('subhead')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detalle de la Carpeta</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Gestión de Carpetas: {{ $carpeta->nombre_carpeta }}</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#add-document-modal">Cargar Nuevo Documento</button>
        </div>

        <!-- Listado de documentos -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible mt-5">
            @if($carpeta->documentos->isNotEmpty())
                <div class="overflow-hidden mx-4 md:mx-10">
                    <table class="w-full table-fixed overflow">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="w-1/2 py-4 px-6 text-left text-gray-600 font-bold uppercase">Nombre</th>
                                <th class="w-1/2 py-4 px-6 text-left text-gray-600 font-bold uppercase">Tipo</th>
                                <th class="w-1/2 py-4 px-6 text-left text-gray-600 font-bold uppercase">Peso</th>
                                <th class="w-1/2 py-4 px-6 text-left text-gray-600 font-bold uppercase"> </th>
                                <th class="w-1/2 py-4 px-6 text-left text-gray-600 font-bold uppercase">Acciones</th>
                        
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($carpeta->documentos->where('en_papelera', false) as $documento)
                                <tr>
                                    <td class="py-4 px-6 border-b border-gray-200">
                                        {{ \Illuminate\Support\Str::limit(str_replace('.pdf','',$documento->nombre_documento), 30, $end='...') }}
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-200">{{ str_replace('application/', '', $documento->tipo) }}</td>
                                    <td class="py-4 px-6 border-b border-gray-200">{{ round($documento->peso / 1048576, 2) }} MB</td>
                                    <td class="py-4 px-6 border-b border-gray-200">
                                        <a href="{{ route('documentos.descargar', $documento->id) }}" class="btn btn-primary ml-2">📥</a>
                                  
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-200">
                                        <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>No hay documentos en esta carpeta.</p>
            @endif
        </div>
    </div>

    <!-- Modal para cargar nuevo documento -->
    <div id="add-document-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="modal-header">
                        <h5 class="modal-title">Cargar Nuevo Documento</h5>
                        <button type="button" class="btn-close" data-tw-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="carpeta_id" value="{{ $carpeta->id }}">
                            
                            <div class="mb-3">
                                <label for="documento" class="form-label">Seleccionar documento (PDF)</label>
                                <input type="file" class="form-control" id="documento" name="documento" accept="application/pdf" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Cargar documento</button>
                            <button type="button" class="btn btn-outline-secondary w-24 mr-1" data-tw-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

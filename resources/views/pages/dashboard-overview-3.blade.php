@extends('../layout/' . $layout)

@section('subhead')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Detalle del Servicio</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Gestión de Servicios: {{ $servicio->nombre_del_servicio }}</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#add-folder-modal">Crear Nueva Carpeta</button>
        </div>

        <!-- Lista de carpetas -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible mt-5">
            @foreach($servicio->carpetas as $carpeta)
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">Carpetas</th>
                            <th class="text-center whitespace-nowrap">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="intro-x">
                            <td class="text-lg font-medium flex justify-between items-center">
                                <a href="{{ route('carpetas.show', $carpeta->id) }}">{{ $carpeta->nombre_carpeta }}</a>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <button class="btn btn-sm btn-warning" data-tw-toggle="modal" data-tw-target="#edit-folder-modal-{{ $carpeta->id }}">Editar</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                {{-- <div class="box p-5 mb-5">
                    <h3 class="text-lg font-medium flex justify-between items-center">
                        <a href="{{ route('carpetas.show', $carpeta->id) }}">{{ $carpeta->nombre_carpeta }}</a>
                        <button class="btn btn-sm btn-warning" data-tw-toggle="modal" data-tw-target="#edit-folder-modal-{{ $carpeta->id }}">Editar</button>
                    </h3>
                </div> --}}

               <!-- Modal para editar carpeta -->
                <div id="edit-folder-modal-{{ $carpeta->id }}" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Carpeta: {{ $carpeta->nombre_carpeta }}</h5>
                                    <button type="button" class="btn-close" data-tw-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="edit-carpeta-form-{{ $carpeta->id }}" action="{{ route('carpetas.update', $carpeta->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="edit_nombre_carpeta_{{ $carpeta->id }}" class="form-label">Nombre de la Carpeta</label>
                                            <input type="text" class="form-control" id="edit_nombre_carpeta_{{ $carpeta->id }}" name="nombre_carpeta" value="{{ $carpeta->nombre_carpeta }}" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                        <button type="button" class="btn btn-outline-secondary w-24 mr-1" data-tw-dismiss="modal">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal para ver y cargar documentos -->
                <div id="view-folder-modal-{{ $carpeta->id }}" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="modal-header">
                                    <h5 class="modal-title">Carpeta: {{ $carpeta->nombre_carpeta }}</h5>
                                    <button type="button" class="btn-close" data-tw-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulario para cargar documentos -->
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
                                
                                    <!-- Listado de documentos -->
                                    @if($carpeta->documentos->isNotEmpty())
                                    <div class="overflow-hidden mx-4 md:mx-10">
                                        <table class="w-full table-fixed overflow">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="w-1/2 py-4 px-6 text-left text-gray-600 font-bold uppercase">Nombre</th>
                                                    <th class="w-1/2 py-4 px-6 text-left text-gray-600 font-bold uppercase">Tipo</th>
                                                    <th class="w-1/2 py-4 px-6 text-left text-gray-600 font-bold uppercase">Peso</th>
                                                    <th class="w-1/2 py-4 px-6 text-left text-gray-600 font-bold uppercase">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white">
                                                @foreach($carpeta->documentos->where('en_papelera', false) as $documento)
                                                    <tr>
                                                        <td class="py-4 px-6 border-b border-gray-200">{{ str_replace('.pdf','',$documento->nombre_documento) }}</td>
                                                        <td class="py-4 px-6 border-b border-gray-200">{{ str_replace('application/', '', $documento->tipo) }}</td>
                                                        <td class="py-4 px-6 border-b border-gray-200">{{ round($documento->peso / 1048576, 2) }} MB</td>
                                                        <td class="py-4 px-6 border-b border-gray-200">
                                                            <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-primary">Eliminar</button>
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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal para crear nueva carpeta -->
    <div id="add-folder-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="modal-header">
                        <h5 class="modal-title">Crear Nueva Carpeta</h5>
                        <button type="button" class="btn-close" data-tw-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('carpetas.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="servicio_id" value="{{ $servicio->id }}">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de la Carpeta</label>
                                <input type="text" class="form-control" id="nombre_carpeta" name="nombre_carpeta" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear Carpeta</button>
                            <button type="button" class="btn btn-outline-secondary w-24 mr-1" data-tw-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function openEditModal(carpetaId, carpetaNombre) {
            // Actualizar el formulario con la información de la carpeta
            $('#edit-carpeta-form-' + carpetaId).attr('action', '{{ route("carpetas.update", ["carpeta" => ":carpeta"]) }}'.replace(':carpeta', carpetaId));
            $('#edit_nombre_carpeta_' + carpetaId).val(carpetaNombre);

            // Mostrar el modal
            $('#edit-folder-modal-' + carpetaId).modal('show');
        }
    </script>
@endsection

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
                <div class="box p-5 mb-5">
                    <h3 class="text-lg font-medium">{{ $carpeta->nombre }}</h3>
                    <button class="btn btn-secondary mt-3" data-tw-toggle="modal" data-tw-target="#add-document-modal-{{ $carpeta->id }}">Añadir Documento</button>

                    <!-- Lista de documentos en la carpeta -->
                    <div class="mt-5">
                        <table class="table table-report">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">Documento</th>
                                    <th class="text-center whitespace-nowrap">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carpeta->documentos as $documento)
                                    <tr class="intro-x">
                                        <td>{{ $documento->nombre }}</td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center text-danger" href="{{ route('documentos.destroy', $documento->id) }}" onclick="event.preventDefault(); document.getElementById('delete-documento-{{ $documento->id }}-form').submit();">
                                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Eliminar
                                                </a>
                                                <form id="delete-documento-{{ $documento->id }}-form" action="{{ route('documentos.destroy', $documento->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal para añadir documento a la carpeta -->
                <div id="add-document-modal-{{ $carpeta->id }}" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="modal-header">
                                    <h5 class="modal-title">Añadir Documento a {{ $carpeta->nombre }}</h5>
                                    <button type="button" class="btn-close" data-tw-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="carpeta_id" value="{{ $carpeta->id }}">

                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre del Documento</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="archivo" class="form-label">Archivo</label>
                                            <input type="file" class="form-control" id="archivo" name="archivo" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Añadir Documento</button>
                                        <button type="button" class="btn btn-outline-secondary w-24 mr-1" data-tw-dismiss="modal">Cancelar</button>
                                    </form>
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

@extends('../layout/' . $layout)

@section('subhead')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gestion de Servicios</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Gestion de Servicios</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#add-confirmation-modal">Registrar Nuevo Servicio</button>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">Nombre del Servicio</th>
                        <th class="text-center whitespace-nowrap">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicios as $servicio)
                    <tr class="intro-x">
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ $servicio->nombre_del_servicio }}</a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 edit-category-link" data-tw-toggle="modal" data-tw-target="#edit-confirmation-modal" onclick="openEditModal('{{ $servicio->id }}', '{{ $servicio->nombre_del_servicio }}', '{{ $servicio->area_id }}')" style="cursor: pointer;">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Editar
                                </a>
                                {{-- <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal" onclick="event.preventDefault(); document.getElementById('delete-servicio-{{ $servicio->id }}-form').submit();">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Eliminar
                                </a>
                                <form id="delete-servicio-{{ $servicio->id }}-form" action="{{ route('servicios.destroy', ['servicio' => $servicio->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form> --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>                
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevron-right"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
        <!-- END: Pagination -->
    </div>

    <!-- BEGIN: add Confirmation Modal -->
    <div id="add-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Añadir Nuevo Servicio</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario para añadir un nuevo servicio -->
                        <form action="{{ route('servicios.store') }}" method="POST">
                            @csrf
    
                            <!-- Campo de selección del área -->
                            <div class="mb-3">
                                <label for="area_id" class="form-label">Área</label>
                                <select class="form-select" id="area_id" name="area_id" required>
                                    <option value="">Seleccione el Área</option>
                                    @foreach($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <!-- Campo del nombre del servicio -->
                            <div class="mb-3">
                                <label for="serviceName" class="form-label">Nombre del Servicio</label>
                                <input type="text" class="form-control" id="nombre_del_servicio" name="nombre_del_servicio" required>
                            </div>
    
                            <!-- Otros campos del formulario, si los necesitas -->
                            <button type="submit" class="btn btn-primary">Añadir Nuevo Servicio</button>
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- END: add Confirmation Modal -->

    <!-- BEGIN: Edit Confirmation Modal -->
    <div id="edit-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Editar Servicio</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario para editar un servicio -->
                        <form id="edit-servicio-form" method="POST" action="">
                            @csrf
                            @method('PUT')
                        
                            <!-- Campo de selección del área -->
                            <div class="mb-3">
                                <label for="edit-area_id" class="form-label">Área</label>
                                <select class="form-select" id="edit-area_id" name="area_id" required>
                                    <option value="">Seleccione el Área</option>
                                    @foreach($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->nombre_area }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <!-- Campo del nombre del servicio -->
                            <div class="mb-3">
                                <label for="edit-nombre_del_servicio" class="form-label">Nombre del Servicio</label>
                                <input type="text" class="form-control" id="edit-nombre_del_servicio" name="nombre_del_servicio" required>
                            </div>
                        
                            <!-- Campo oculto para almacenar el ID del servicio -->
                            <input type="hidden" id="edit-servicio_id" name="servicio_id">
                        
                            <!-- Otros campos del formulario, si los necesitas -->
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <button type="button" class="btn btn-outline-secondary w-24 mr-1" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Edit Confirmation Modal -->
@endsection

@section('script')
    <script>
        function openEditModal(servicioId, servicioNombre, servicioAreaId) {
            // Actualizar el formulario con la información del servicio
            $('#edit-servicio-form').attr('action', '{{ route("servicios.update", ["servicio" => ":servicio"]) }}'.replace(':servicio', servicioId));
            $('#edit-servicio_id').val(servicioId);
            $('#edit-nombre_del_servicio').val(servicioNombre);
            $('#edit-area_id').val(servicioAreaId);

            // Mostrar el modal
            $('#edit-confirmation-modal').modal('show');
        }
    </script>
@endsection

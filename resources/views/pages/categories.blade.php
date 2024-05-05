@extends('../layout/' . $layout)

@section('subhead')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add-Document</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Gestion de Area Documental</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#add-confirmation-modal">Registrar Nueva Area</button>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">Nombre del Area</th>
                        <th class="text-center whitespace-nowrap">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <tr class="intro-x">
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">Farmacia</a>
                            </td>
                            
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 edit-category-link"  data-tw-toggle="modal" data-tw-target="#edit-confirmation-modal" style="cursor: pointer;">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Editar
                                    </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr class="intro-x">
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">Tesoreria</a>
                            </td>
                            
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 edit-category-link"  data-tw-toggle="modal" data-tw-target="#edit-confirmation-modal" style="cursor: pointer;">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Editar
                                    </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr class="intro-x">
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">Talento Humano</a>
                            </td>
                            
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 edit-category-link"  data-tw-toggle="modal" data-tw-target="#edit-confirmation-modal" style="cursor: pointer;">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Editar
                                    </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr class="intro-x">
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">Medicina General</a>
                            </td>
                            
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 edit-category-link"  data-tw-toggle="modal" data-tw-target="#edit-confirmation-modal" style="cursor: pointer;">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Editar
                                    </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                 
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
        <h5 class="modal-title" id="addCategoryModalLabel"></h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario para añadir una nueva categoría -->
        <form action="" method="POST">
        @csrf


          <!-- Campos del formulario -->
          <div class="mb-3">
            <label for="categoryName" class="form-label">Nombre del Area </label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          
          <!-- Otros campos del formulario, si los necesitas -->
          <button type="submit" class="btn btn-primary">Añadir Nueva Area Documental</button>
          <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
        </form>
      </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: add Confirmation Modal -->

    
@endsection

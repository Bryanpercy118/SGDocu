@extends('../layout/' . $layout)

@section('subhead')
    <title>Panel Principal</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-8 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Reporte General</h2>
                        <a href="" class="ml-auto flex items-center text-primary">
                            <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Recargar Datos
                        </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                       
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                       
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">2.149</div>
                                    <div class="text-base text-slate-500 mt-1">Total Documentos en el Sistema</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="user" class="report-box__icon text-success"></i>
                                     
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">5</div>
                                    <div class="text-base text-slate-500 mt-1">Usuarios en el Sistema </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="trash" class="report-box__icon text-red-500"></i>

                                     
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">25</div>
                                    <div class="text-base text-slate-500 mt-1">Documentos en Papelera</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="briefcase" class="report-box__icon text-warning"></i>

                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">12</div>
                                    <div class="text-base text-slate-500 mt-1">Total Departamentos en el Sistema</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
               
                
                
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Documentos Subidos en la Semana</h2>
                        {{-- <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <button class="btn box flex items-center text-slate-600 dark:text-slate-300">
                                <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                            </button>
                            <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300">
                                <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF
                            </button>
                        </div> --}}
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">Nombre del Documento</th>
                                    <th class="text-center whitespace-nowrap">Area</th>
                                    <th class="text-center whitespace-nowrap">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="intro-x">
                                    <td class="align-middle">
                                        <a href="" class="font-medium whitespace-nowrap">FD-02</a>
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">PDF</div>
                                    </td>
                                    <td class="text-center align-middle">Farmacia</td>
                                   
                                    <td class="table-report__action w-56 align-middle">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="">
                                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Revisar
                                            </a>
                                            {{-- <a class="flex items-center text-danger" href="">
                                                <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Eliminar
                                            </a> --}}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>                        
                    </div>
                    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
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
                        
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>
       
    </div>
@endsection

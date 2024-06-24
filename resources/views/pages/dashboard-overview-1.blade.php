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
                        <h2 class="text-lg font-medium truncate mr-5">Sistema Documental Area Asistencial</h2>
                        <a href="" class="ml-auto flex items-center text-primary">
                            <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Actualizar
                        </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        @foreach($servicios as $servicio)
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <a href="{{ route('servicios.show', $servicio->id) }}" class="block">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="text-xl font-medium leading-8 mt-6">{{ $servicio->nombre_del_servicio }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>           
            </div>
        </div>
    </div>
@endsection

@extends('../layout/' . $layout)

@section('subhead')
    <title>Soporte</title>
@endsection

@section('subcontent')
    <div class="mt-2">
        <div class="intro-y col-span-11 2xl:col-span-9">
            <div class="intro-y box p-5">
                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                    <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                        <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Soportes Registrados
                    </div>
                    <div class="mt-5">
                        @foreach ($soportes as $soporte)
                            <div class="flex flex-col items-start xl:flex-row border-b border-gray-200 py-4">
                                <div class="w-full xl:w-1/4 text-sm mb-1 xl:mb-0"> <!-- Adjust width as per your design -->
                                    <span class="font-semibold">Tipo:</span> {{ $soporte->issue_type }}
                                </div>
                                <div class="w-full xl:w-1/2 text-sm mb-1 xl:mb-0"> <!-- Adjust width as per your design -->
                                    <span class="font-semibold">Descripción:</span> {{ $soporte->description }}
                                </div>
                                <div class="w-full xl:w-1/4 text-sm mb-1 xl:mb-0"> <!-- Adjust width as per your design -->
                                    <span class="font-semibold">Usuario:</span> {{ $soporte->user->email }}
                                </div>
                                <div class="w-full xl:w-1/4 text-sm mb-1 xl:mb-0">
                                    <span class="font-semibold">Fecha:</span> {{ $soporte->created_at->format('Y-m-d') }}
                                </div>
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/ckeditor-classic.js')
@endsection

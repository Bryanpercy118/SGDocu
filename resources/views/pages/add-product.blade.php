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
                        <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Notificaciones
                    </div>
                    <div class="mt-5">
                        <div class="form-inline items-start flex-col xl:flex-row mt-10">
                            <i class="w-4 h-4 mr-2"></i> Notificaciones
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @vite('resources/js/ckeditor-classic.js')
@endsection

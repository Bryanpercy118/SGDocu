@extends('../layout/' . $layout)

@section('subhead')
    <title>Gestion de Usuarios</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Gestion de Usuarios</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#add-user-modal">Nuevo Usuario</button>
        </div>
        <!-- BEGIN: Users Layout -->
        @foreach ($users as $user)
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box">
                    <div class="flex flex-col lg:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1 flex items-center justify-center bg-gray-200 rounded-full">
                            <span class="text-2xl text-gray-600">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">{{ $user->name }}</a>
                            <div class="text-slate-500 text-xs mt-0.5">Email: {{ $user->email }}</div>
                            <div class="text-slate-500 text-xs mt-0.5">Rol: {{ $user->roles->pluck('name')->implode(', ') }}</div>
                       
                            <!-- <div class="text-slate-500 text-xs mt-0.5">Contraseña: {{ $user->plain_password ?? $user->password }}</div>
                        -->
                        </div>
                        <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                            <a href="javascript:;" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip" title="Editar" data-tw-toggle="modal" data-tw-target="#edit-user-modal" onclick="openEditModal('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}', '{{ $user->roles->pluck('name')->implode(', ') }}')">
                                <i class="w-3 h-3 fill-current" data-lucide="edit"></i>
                            </a>
                            <a href="javascript:;" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip" title="Eliminar" onclick="deleteUser('{{ $user->id }}')">
                                <i class="w-3 h-3 fill-current" data-lucide="trash"></i>
                            </a>
                            <a href="{{ route('users.resetPassword', $user->id) }}" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-darkmode-400 ml-2 text-slate-400 zoom-in tooltip" title="Restablecer Contraseña">
                                <i class="w-3 h-3 fill-current" data-lucide="refresh-cw"></i>
                            </a>
                            <form id="delete-user-{{ $user->id }}-form" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- END: Users Layout -->
    </div>

    <!-- BEGIN: Add User Modal -->
    <div id="add-user-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-tw-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Rol</label>
                            <select class="form-select" id="role" name="role" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-outline-secondary w-24 mr-1" data-tw-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Add User Modal -->

    <!-- BEGIN: Edit User Modal -->
    <div id="edit-user-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Usuario</h5>
                <button type="button" class="btn-close" data-tw-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-user-form" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="edit-name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit-email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-role" class="form-label">Rol</label>
                        <select class="form-select" id="edit-role" name="role" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-password" class="form-label">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="edit-password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <button type="button" class="btn btn-outline-secondary w-24 mr-1" data-tw-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- END: Edit User Modal -->
@endsection

@section('script')
<script>
    function openEditModal(userId, userName, userEmail, userRole) {
        $('#edit-user-form').attr('action', '{{ route("users.update", ":user") }}'.replace(':user', userId));
        $('#edit-name').val(userName);
        $('#edit-email').val(userEmail);
        $('#edit-role').val(userRole);
        $('#edit-password').val('');
        $('#edit-user-modal').modal('show');
    }

    function deleteUser(userId) {
        if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
            document.getElementById('delete-user-' + userId + '-form').submit();
        }
    }
</script>

@endsection

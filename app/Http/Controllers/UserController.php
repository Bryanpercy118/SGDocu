<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash; // Asegúrate de importar Hash correctamente

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
    }
    public function resetPassword(User $user)
    {
        // Generar una nueva contraseña aleatoria
        $newPassword = Str::random(10);
        
        // Actualizar el registro del usuario con la nueva contraseña hasheada
        $user->update([
            'password' => Hash::make($newPassword),
            'plain_password' => $newPassword
        ]);

        // Puedes enviar la nueva contraseña por correo electrónico, o simplemente mostrarla en la interfaz
        // Mail::to($user->email)->send(new PasswordResetMail($newPassword));

        return redirect()->back()->with('success', 'La contraseña ha sido restablecida. La nueva contraseña es: ' . $newPassword);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los roles y pasarlos a la vista de creación de usuario
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validar y crear un nuevo usuario
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'required|string|exists:roles,name',
            ]);
    
            // Proporcionar valores predeterminados para campos adicionales
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'plain_password' => $validated['password'], // Guardar la contraseña en texto plano
                'gender' => 'male',
                'active' => 1,
                'remember_token' => Str::random(10)
            ]);
    
            // Asignar el rol al usuario
            $user->assignRole($validated['role']);
    
            return redirect()->back()->with('success', 'Usuario creado exitosamente.');
        } catch (\Exception $e) {
            // Usar dd() para depurar el error
            dd($e->getMessage());
        }
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Mostrar un usuario específico
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Obtener todos los roles y pasar el usuario y roles a la vista de edición
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validar y actualizar el usuario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|exists:roles,name',
            'password' => 'nullable|string|min:8', // Validar la contraseña si se proporciona
        ]);

        // Datos a actualizar
        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password'=>$validated['password'],
            'plaint_password' => $validated['password']
        ];

        // Si se proporciona una nueva contraseña, actualízala
        if (!empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
            $updateData['plain_password'] = $validated['password'];
        }

        // Actualizar el usuario con los datos validados
        $user->update($updateData);

        // Actualizar el rol del usuario
        $user->syncRoles($validated['role']);

        return redirect()->back()->with('success', 'Usuario actualizado exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Eliminar el usuario
        $user->delete();

        return redirect()->back()->with('success', 'Usuario eliminado exitosamente.');
    }
}

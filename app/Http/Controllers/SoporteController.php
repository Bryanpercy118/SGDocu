<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soporte;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Asegúrate de que tienes el modelo User importado
use Illuminate\Support\Facades\Hash;
class SoporteController extends Controller
{
    public function index()
    {
        $soportes = Soporte::all();
        return view('soporte.index', compact('soportes'));
    }

    public function create()
    {
        return view('soporte.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'issue_type' => 'required',
            'description' => 'required',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Crear el soporte con los datos del formulario y el usuario autenticado
        $soporte = new Soporte([
            'user_id' => $user->id,
            'issue_type' => $request->issue_type,
            'description' => $request->description,
        ]);

        $soporte->save();

        // Aquí puedes realizar cualquier acción adicional, como notificar o loggear

        return redirect()->back()->with('success', 'Soporte creado correctamente.');
    }
    public function actualizarContraseña(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'new-password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->password = Hash::make($request->input('new-password'));
            $user->save();

            return redirect()->route('login')->with('status', 'Contraseña actualizada con éxito.');
        }

        return redirect()->back()->withErrors(['email' => 'Email no encontrado.']);
    }
}

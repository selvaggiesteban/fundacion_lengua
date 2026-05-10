<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountSettingsAccount extends Controller
{
    public function index()
    {
        return view('content.pages.pages-account-settings-account');
    }

    /**
     * Actualiza la información del usuario autenticado.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:300', // Reglas de validación para el avatar
        ]);

        // Asignación de los nuevos valores
        $user->name = $request->name;
        $user->email = $request->email;

        // Lógica para manejar la subida del avatar
        if ($request->hasFile('avatar')) {
            // Elimina el avatar anterior si ya existe uno
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Guarda el nuevo avatar en la carpeta 'storage/app/public/avatars'
            // y asigna la ruta al modelo de usuario.
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();

        // Redirecciona a la página anterior con un mensaje de éxito
        return back()->with('success', 'Perfil actualizado correctamente.');
    }
}
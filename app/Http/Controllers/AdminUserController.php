<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

// MODEL
use App\Models\User;

// HASH
use Illuminate\Support\Facades\Hash;

// EXCEPTIONS
use Illuminate\Database\QueryException;
use Throwable;

class AdminUserController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validación
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', 'in:client,admin'],
        ]);

        // 2. Limpieza (trim)
        $validated = array_map('trim', $validated);

        // 3. Guardar usuarios
        try {
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role'],
            ]);

            return back()->with('success', 'Usuario creado correctamente');

        } catch (QueryException $e) {
            // Error de base de datos (conexión, constraint, etc.)
            return back()
                ->withInput()
                ->with('error', 'No se pudo conectar con la base de datos. Intenta nuevamente.');

        } catch (Throwable $e) {
            // Cualquier otro error inesperado
            return back()
                ->withInput()
                ->with('error', 'Ocurrió un error inesperado al crear el usuario. Intenta nuevamente.');
        }
    }
}

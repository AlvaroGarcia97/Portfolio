<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    // GET /admin/password -> muestra el formulario.
    public function edit()
    {
        return view('admin.password.edit');
    }

    // PUT /admin/password -> valida y guarda la nueva contraseña.
    public function update(Request $request)
    {
        $data = $request->validate([
            // 'current_password' comprueba que la contraseña actual es correcta.
            'current_password' => ['required', 'current_password'],
            // 'confirmed' exige que "password_confirmation" sea igual a "password".
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Ciframos la nueva contraseña antes de guardarla (bcrypt).
        $request->user()->update([
            'password' => Hash::make($data['password']),
        ]);

        return back()->with('status', 'Contraseña actualizada correctamente.');
    }
}

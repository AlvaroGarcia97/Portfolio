<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Credenciales configurables por entorno. En producción define
        // ADMIN_EMAIL y ADMIN_PASSWORD en el .env.
        $email = env('ADMIN_EMAIL', 'alvaroogarcia97@gmail.com');

        // firstOrCreate: crea el admin si no existe, pero NO cambia su
        // contraseña si ya existe (así no se resetea en cada seed).
        User::firstOrCreate(
            ['email' => $email],
            [
                'name' => env('ADMIN_NAME', 'Álvaro García Sangüesa'),
                'password' => env('ADMIN_PASSWORD', 'password'),
            ],
        );
    }
}

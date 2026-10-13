<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'alvaroogarcia97@gmail.com'],
            [
                'name' => 'Álvaro García Sangüesa',
                'password' => 'password',
            ],
        );
    }
}

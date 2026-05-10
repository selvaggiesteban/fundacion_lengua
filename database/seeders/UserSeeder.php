<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Importamos el modelo User
// La línea "use Illuminate\Support\Str;" ha sido eliminada porque no es necesaria en este seeder.

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Crear SuperAdministrador (original)
        User::create([
            'name' => 'Super Admin User',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'), // Contraseña: password
            'role' => User::ROLE_SUPERADMIN,
        ]);

        // Crear Administrador (original)
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Contraseña: password
            'role' => User::ROLE_ADMIN,
        ]);

        // Crear Estudiante (original)
        User::create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => Hash::make('password'), // Contraseña: password
            'role' => User::ROLE_STUDENT,
        ]);

        // Solo mantener los 3 usuarios básicos para el sistema
    }
}
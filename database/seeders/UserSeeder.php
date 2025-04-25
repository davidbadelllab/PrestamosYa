<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario administrador
        User::create([
            'name' => 'Admin',
            'email' => 'admin@prestamosya.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        // Usuarios de prueba
        $users = [
            [
                'name' => 'Juan Pérez',
                'email' => 'juan@prestamosya.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'María González',
                'email' => 'maria@prestamosya.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Carlos Rodríguez',
                'email' => 'carlos@prestamosya.com',
                'password' => Hash::make('password123'),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

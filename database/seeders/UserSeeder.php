<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{

    protected $order = 2;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->assignRole('user'); // Asignar el rol "user"

        User::create([
            'name' => 'Agent',
            'email' => 'agent@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->assignRole('agent'); // Asignar el rol "agent"

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->assignRole('admin'); // Asignar el rol "admin"
        User::create([
            'name' => 'Usuario2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->assignRole('user'); // Asignar el rol "user"

        User::create([
            'name' => 'Agente2',
            'email' => 'agent2@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->assignRole('agent'); // Asignar el rol "agent"
        User::create([
            'name' => 'Usuario3',
            'email' => 'user3@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->assignRole('user'); // Asignar el rol "user"

        User::create([
            'name' => 'Agente3',
            'email' => 'agent3@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->assignRole('agent'); // Asignar el rol "agent"
        User::create([
            'name' => 'Usuario4',
            'email' => 'user4@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->assignRole('user'); // Asignar el rol "user"

        User::create([
            'name' => 'usuario5',
            'email' => 'user5@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ])->assignRole('user'); // Asignar el rol "agent"

       // User::factory(2)->create();
    }
}

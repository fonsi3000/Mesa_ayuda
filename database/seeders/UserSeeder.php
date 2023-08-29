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
        ])->assignRole('user'); // Asignar el rol "user"

        User::create([
            'name' => 'Agent',
            'email' => 'agent@example.com',
            'password' => Hash::make('password'),
        ])->assignRole('agent'); // Asignar el rol "agent"

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ])->assignRole('admin'); // Asignar el rol "admin"

       // User::factory(2)->create();
    }
}

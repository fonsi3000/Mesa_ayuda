<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{

    protected $order = 1;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $agent = Role::create(['name' => 'agent']);
        $user = Role::create(['name' => 'user']);

        Permission::create(['name' => 'dashboard'])->assignRole([$user]);
        Permission::create(['name' => 'tickets.index'])->assignRole([$admin, $agent]);
        Permission::create(['name' => 'user'])->assignRole([$user]);
        Permission::create(['name' => 'agent'])->assignRole([$agent]);
        Permission::create(['name' => 'admin'])->assignRole([$admin]);
    }
}

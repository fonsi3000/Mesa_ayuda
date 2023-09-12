<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'name' => 'Software',
        ]);
        Categories::create([
            'name' => 'hardware',
        ]);
        Categories::create([
            'name' => 'Bugs',
        ]);
        Categories::create([
            'name' => 'PQR',
        ]);


       // User::factory(2)->create();
    }
}
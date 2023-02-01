<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Items;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Categories::factory()->count(5)->create();
        Items::factory()->count(15)->create();
    }
}
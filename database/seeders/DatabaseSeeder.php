<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Categories;
use App\Models\Employee;
use App\Models\EmployeeContacts;
use App\Models\Items;
use App\Models\Order;
use App\Models\Table;
use App\Models\User;
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
        // Categories::factory()->count(5)->create();
        // Items::factory()->count(15)->create();
        Employee::factory()->count(10)->create();
        User::factory()->count(5)->create();
        EmployeeContacts::factory()->count(5)->create();
        // Table::factory()->count(5)->create();
        // Order::factory()->count(10)->create();
    }
}

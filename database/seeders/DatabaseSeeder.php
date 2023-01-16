<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin\Labtest;
use Database\Seeders\Admin\AdminSeeder;
use Database\Seeders\Admin\CategorySeeder;
use Database\Seeders\Admin\HospitalSeeder;
use Database\Seeders\Admin\LabTestSeeder;
use Database\Seeders\Admin\RoleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(HospitalSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(LabTestSeeder::class);
    }
}

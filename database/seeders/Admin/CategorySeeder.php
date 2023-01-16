<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'hospital_id'=> 1,
            'name'=> 'Blood tests',
            'slug'=>Str::slug('Blood tests', '-'),
            'description'=> 'Most blood tests only take a few minutes to complete and are carried out at your GP surgery or local hospital by a doctor, nurse or phlebotomist (a specialist in taking blood samples).',
            'thumbnail'=> 'blood.jpeg',
        ]);
    }
}

<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Hospital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hospital::create([
            'name'=> 'Lab Aid Hospital',
            'slug'=>Str::slug('Lab Aid Hospital', '-'),
            'sub_title'=> 'Labaid is one of the largest and most recognized private healthcare brands in Bangladesh.',
            'description'=> 'Labaid is one of the largest and most recognized private healthcare brands in Bangladesh.',
            'thumbnail'=> 'hospital1.webp',
        ]);

        Hospital::create([
            'name'=> 'Squre Hospital',
            'slug'=>Str::slug('Squre Hospital', '-'),
            'sub_title'=> 'Squre is one of the largest and most recognized private healthcare brands in Bangladesh.',
            'description'=> 'LabaSqureid is one of the largest and most recognized private healthcare brands in Bangladesh.',
            'thumbnail'=> 'hospital2.webp',
        ]);
    }
}

<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Labtest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LabTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Labtest::create([
            'hospital_id'=>1,
            'category_id'=>1,
            'name'=> 'TC DC Blood Test',
            'slug'=>Str::slug('Lab Aid Hospital', '-'),
            'price'=>250,
            'description'=> 'The test measures Hb (Hemoglobin), TC (Total count), DC (Differential count), and ESR(Erythrocyte Sedimentation Rate).It gives information about the general',
            'thumbnail'=> 'tc-dc.jpeg',
            'admin_id'=> 1,
        ]);
    }
}

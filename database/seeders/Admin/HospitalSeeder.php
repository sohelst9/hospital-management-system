<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Admin;
use App\Models\Admin\Hospital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $admin_id = Admin::create([
            'username'=>'squre',
            'email'=>'squre@gmail.com',
            'password'=>Hash::make('123456'),
            'Is_admin'=>0
        ]);
        Hospital::create([
            'name'=> 'Squre Hospital',
            'slug'=>Str::slug('Squre Hospital', '-'),
            'sub_title'=> 'Squre is one of the largest and most recognized private healthcare brands in Bangladesh.',
            'description'=> 'LabaSqureid is one of the largest and most recognized private healthcare brands in Bangladesh.',
            'thumbnail'=> 'hospital2.webp',
            'admin_id'=> $admin_id->id,
        ]);
    }
}

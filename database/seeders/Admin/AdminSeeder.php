<?php

namespace Database\Seeders\Admin;

use App\Models\Admin\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin= Admin::create([
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'phone'=>'01709876543',
            'image'=>'1.webp',
            'password'=>Hash::make('123456'),
            'Is_admin'=>1,
       ]);
    }
}

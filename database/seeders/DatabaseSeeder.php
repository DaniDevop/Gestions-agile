<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([

            'nom'=>'admin',
            'email'=>'admin@gmail.com',
            'role'=>'ADMIN',
            'profile'=>'',
            'active'=>true,
            'password'=>Hash::make('admin')
        ]);
        
    }
}

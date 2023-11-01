<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::updateOrCreate([
            'super' => 1
        ], [
            'name'=>'qusai',
            'password'=>bcrypt('Qusai@almallah-cloud12'),
        ]);
    }
}

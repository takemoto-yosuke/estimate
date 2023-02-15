<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::create([
            'name' => 'コア',
            'login_id' => 'core',
            'password' => Hash::make('core9321300'),
            'role' => 0,
         ]);
         \App\Models\User::create([
            'name' => 'マイスワン',
            'login_id' => 'miceone',
            'password' => Hash::make('micenavi'),
            'role' => 1,
         ]);
        $this->call(CategorySeeder::class);
        $this->call(EstimateSeeder::class);
        $this->call(CheckItemSeeder::class);
        //$this->call(UsersSeeder::class);
    }
}


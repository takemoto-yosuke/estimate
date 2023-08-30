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
            'name' => 'webD課',
            'login_id' => 'core',
            'password' => Hash::make('core9321300'),
            'role' => 0,
         ]);
         \App\Models\User::create([
            'name' => '開発1課',
            'login_id' => 'yamane',
            'password' => Hash::make('core9321300'),
            'role' => 1,
         ]);
         \App\Models\User::create([
            'name' => 'マイスワン',
            'login_id' => 'miceone',
            'password' => Hash::make('micenavi'),
            'role' => 2,
         ]);
        $this->call(CategorySeeder::class);
        $this->call(EstimateSeeder::class);
        $this->call(CheckItemSeeder::class);
        $this->call(RegiCategorySeeder::class);
        $this->call(RegiEstimateSeeder::class);
        $this->call(RegiCheckitemSeeder::class);
        //$this->call(UsersSeeder::class);
    }
}


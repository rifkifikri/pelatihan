<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
    // $this->call([
    //     StatusPengajuanSeeder::class,
    // ]);


    User::factory()->create([
        'nik' => '3201234567890123',
        'name' => 'Administrator',
        'phone' => '082198788672',
        'email' => 'admin@halal.test',
        'password' => Hash::make('password'),
    ]);
    }
    
    

}
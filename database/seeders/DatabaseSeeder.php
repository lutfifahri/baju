<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([]);

        // $user = User::factory()->create([
        //     'employee_id_number' => '000001',
        //     'first_name'         => 'LUTFI',
        //     'last_name'          => 'FAHRI',
        //     'full_name'          => 'LUTFI FAHRI',
        //     'email'              => 'lfahri959@gmail.com',
        // ]);
        User::factory()->create([
            'first_name' => 'LUTFI',
            'last_name'  => 'FAHRI',
            'full_name'  => 'LUTFI FAHRI',
            'email'      => 'lfahri959@gmail.com',
            'password'   => bcrypt('password'), // Pastikan menggunakan kolom password
        ]);
    }
}

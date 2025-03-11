<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User 1',
            'email' => 'admin1@example.com',
            'password' => bcrypt('password123'), // Hachage sécurisé du mot de passe
        ]);
    }
}

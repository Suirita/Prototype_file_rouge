<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the default user
        if (User::where('email', 'test@example.com')->doesntExist()) {
            User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'), // Or any password you want
            ]);
        }

        $user = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin')
        ]);
        // Call other seeders
        $this->call([
            CategorySeeder::class,  // Add CategorySeeder
            TagSeeder::class,       // Add TagSeeder
            ArticleSeeder::class,   // Add ArticleSeeder
            ArticleTagSeeder::class,// Add ArticleTagSeeder
            RolePermissionSeeder::class,// Add Role & permission
        ]);
        $user->assignRole('admin');
    }
}


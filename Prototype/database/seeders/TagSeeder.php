<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // For generating slugs

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'name' => 'Laravel',
                'slug' => Str::slug('Laravel'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PHP',
                'slug' => Str::slug('PHP'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'JavaScript',
                'slug' => Str::slug('JavaScript'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vue.js',
                'slug' => Str::slug('Vue.js'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tailwind CSS',
                'slug' => Str::slug('Tailwind CSS'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

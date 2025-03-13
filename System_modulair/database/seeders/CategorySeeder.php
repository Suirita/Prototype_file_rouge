<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // For generating slugs

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Web Development',
                'slug' => Str::slug('Web Development'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Design',
                'slug' => Str::slug('Design'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Programming Languages',
                'slug' => Str::slug('Programming Languages'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Software Engineering',
                'slug' => Str::slug('Software Engineering'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Machine Learning',
                'slug' => Str::slug('Machine Learning'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

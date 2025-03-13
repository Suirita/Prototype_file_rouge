<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('article_tag')->insert([
            ['article_id' => 1, 'tag_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['article_id' => 1, 'tag_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['article_id' => 2, 'tag_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['article_id' => 3, 'tag_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['article_id' => 4, 'tag_id' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

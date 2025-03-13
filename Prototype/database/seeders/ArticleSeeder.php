<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'title' => 'Understanding Laravel: A Beginner\'s Guide',
                'content' => 'Laravel is a PHP framework that provides elegant syntax and a wide array of tools for web development. In this article, we will explore the basics of Laravel and why it is a popular choice for building modern web applications.',
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'How to Use Tailwind CSS for Responsive Web Design',
                'content' => 'Tailwind CSS is a utility-first CSS framework that makes it easy to design responsive websites. This article demonstrates how to use Tailwind to create responsive layouts and components that adjust seamlessly to various screen sizes.',
                'user_id' => 1,
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Exploring the New Features in PHP 8.1',
                'content' => 'PHP 8.1 introduces several new features that enhance performance and developer productivity. This article highlights exciting new additions like Fibers, Intersection Types, and Array Unpacking, which improve PHP\'s functionality and usability.',
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'The Future of JavaScript: ECMAScript 2024',
                'content' => 'JavaScript continues to evolve, with new features coming in ECMAScript 2024. This article explores the upcoming improvements in async programming, data structures, and other features that JavaScript developers can expect in the next version.',
                'user_id' => 1,
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Best Practices for Writing Clean Code in 2024',
                'content' => 'Writing clean code is a crucial aspect of software development. This article discusses best practices for writing readable, maintainable, and efficient code in 2024, including tips for proper naming conventions, modularity, and avoiding code duplication.',
                'user_id' => 1,
                'category_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function store(array $validatedData)
    {
        return Category::create([
            'name' => $validatedData['title'],
            'slug' => $validatedData['slug'],
        ]);
    }

    public function update(Category $category, array $validatedData)
    {
        return $category->update([
            'name' => $validatedData['title'],
            'slug' => $validatedData['slug'],
        ]);
    }

    public function destroy(Category $category)
    {
        return $category->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = Category::paginate(4);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        $this->categoryService->store($validated);

        return redirect()->route('category.index')->with('success', 'Catégorie créé avec succès.');
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $validated = $request->validated();

        $this->categoryService->update($category, $validated);

        return redirect()->route('category.index');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function destroy(Category $category)
    {
        $this->categoryService->destroy($category);
        return redirect()->route('category.index');
    }
}

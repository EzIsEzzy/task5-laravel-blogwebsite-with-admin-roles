<?php

namespace App\Http\Controllers;
use App\Http\Repositories\CategoryRepository;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryRepository $categoryRepository)
    {
        $categories = $categoryRepository->all();
        return view("admin.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request, CategoryRepository $categoryRepository)
    {
        $data = [
            "name" => $request->safe()->name,
            "slug" => Str::slug( $request->safe()->name)
        ];
        $categoryRepository->create($data);
       return redirect()->route('categories.create')->with('success','Category Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->find($category->id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category, CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->find($category->id);
        $data = [
            "name" => $request->safe()->name,
            "slug" => Str::slug( $request->safe()->name)
        ];

        $categoryRepository->update($category->id,$data);
       return redirect()->route('categories.edit')->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, CategoryRepository $categoryRepository)
    {
        $categoryRepository->delete($category->id);

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}

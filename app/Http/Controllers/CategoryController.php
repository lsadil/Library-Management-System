<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        request()->validate(['name' => ['required', 'max:255', 'min:3', 'string'],]);

        $category = new Category;
        $category->name = $request->input('name');
        $category->save();
        return redirect('Categories');
    }

    public function update(Request $request, $name)
    {
        request()->validate(['name' => ['required', 'max:255', 'min:3', 'string'],]);

        $category = Category::firstWhere('name', $name);
        $category->name = ($request->filled('name')) ? ($request->input('name')) : ($category->name);
        $category->save();
        return redirect('Categories');
    }

    public function destroy($name)
    {
        $categrory = Category::firstWhere('name', $name);
        $categrory->delete();
        return redirect('Categories');
    }
}

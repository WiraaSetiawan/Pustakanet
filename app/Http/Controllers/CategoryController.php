<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
       
        return view('category', compact('categories'));
    }

    public function create()
    {
        return view('create_category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            
        ]);

        Category::create([
            'name' => $request->input('name'),
           
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('updateCategory', compact('category'));
    }
    
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,',
        ]);

        $category = Category::where('slug', $slug)->firstOrFail();
        $category->slug = null;
        $category->update($request->all());
    
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }
    
    
    public function destroy($id)
    {
        $category = Category::find($id);
    
        if (!$category) {
            return redirect('/admin/categories')->with('error', 'Category not found');
        }
    
        
        $category->books()->detach();
  
        
        $category->delete();
    
        return redirect('/categories')->with('success', 'Category deleted successfully');
    }
    

}

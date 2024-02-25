<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::query();
         //fungsi search
        if ($request->has('search')) {
            $search = $request->input('search');
            $categories->where('nm_kategori', 'like', '%' . $search . '%')
                       ->orWhere('deskripsi', 'like', '%' . $search . '%');
        }
            // Tambahkan metode orderBy untuk mengurutkan data berdasarkan kolom created_at (atau yang lain sesuai kebutuhan)
            $categories->orderBy('created_at', 'desc');
            // Eksekusi query dan ambil hasilnya menggunakan ->get()
            $categories = $categories->get();
            
    
        return view('admin.category.index', compact('categories'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create | Category';
        return view('admin.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'max:255'],
        ];

        $validatedData = $request->validate($rules);

        Category::create($validatedData);

        return redirect('/dashboard/category')->with('success', 'New Cateory has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $title = 'Edit | Category';
        return view('admin.category.edit', compact('category', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $categories)
    {
        $rules = [
            'name' => ['required', 'max:255'],
        ];

        $validatedData = $request->validate($rules);

        Category::where('id', $categories->id)->update($validatedData);

        return redirect('/dashboard/category')->with('success', 'New Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect('/dashboard/category')->with('success', 'Category has been deleted');
    }
}

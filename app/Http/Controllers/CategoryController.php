<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function index()
    {
        $this->data['categories'] = Category::all();
        $this->data['message'] = Session::get('message');
        return view('admin.categories.category', $this->data);
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $this->data = $request->all();
        Category::create($this->data);
        
        Session::flash('message', 'Category Added Successfully');
            
        return redirect()->to('/category');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        
        Session::flash('message', 'Category Deleted Successfully');
        
        return redirect()->to('/category');
    }
}

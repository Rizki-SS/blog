<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = Category::all();
        return view('category.index', compact('data'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:category,name',
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created');
    }

    public function edit($id)
    {
        $data = Category::find($id);
        return view('category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = Category::find($id);
        $data->name = $request->name;
        $data->save();

        return redirect()->route('categories.index')->with('success', 'Category Updated');
    }

    public function show($id)
    {
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->route('categories.index')->with('success', 'Category Deleted');
    }
}

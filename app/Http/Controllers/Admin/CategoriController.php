<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Categori;
use Illuminate\Http\Request;

class CategoriController extends BaseController
{
    public function index()
    {
        $categories = Categori::all();
        return view('BE.pages.categori.index', compact('categories'));
    }

    public function create()
    {

        return view('BE.pages.categori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Categori::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categori.index')->with('success', 'Category created successfully!');
    }

    public function edit($id)
    {
        $category = Categori::findOrFail($id);
        return view('BE.pages.categori.update', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Categori::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categori.index')->with('success', 'Category updated successfully!');
    }


    public function destroy($id)
    {
        $category = Categori::findOrFail($id);
        $category->delete();

        return redirect()->route('categori.index')->with('success', 'Category deleted successfully!');
    }
}

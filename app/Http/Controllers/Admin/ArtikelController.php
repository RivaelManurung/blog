<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Categori;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::orderBy('id', 'desc')->get();
        $categories = Categori::all();
        return view('BE.pages.artikel.index', compact('artikel', 'categories'));
    }

    public function create()
    {
        $categories = Categori::all();
        return view('BE.pages.artikel.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_categories' => 'required|integer|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        Artikel::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $imageName,
            'id_categories' => $request->id_categories,
        ]);

        return back()->with('success', 'Form submitted successfully!');
    }

    public function show($id)
    {
        $article = Artikel::findOrFail($id);
        return view('BE.pages.artikel.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Artikel::findOrFail($id);
        $categories = Categori::all();
        return view('BE.pages.artikel.update', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_categories' => 'required|integer|exists:categories,id',
        ]);

        $article = Artikel::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            if ($article->image) {
                unlink(public_path('images') . '/' . $article->image);
            }

            $article->image = $imageName;
        }

        $article->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'id_categories' => $request->id_categories,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Article updated successfully!');
    }

    public function destroy($id)
    {
        $article = Artikel::findOrFail($id);

        if ($article->image) {
            unlink(public_path('images') . '/' . $article->image);
        }

        $article->delete();

        return redirect()->route('artikel.index')->with('success', 'Article deleted successfully!');
    }
}


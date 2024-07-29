<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Categori;

class ArtikelController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data dari formulir
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_categories' => 'required|integer|exists:categories,id',

        ]);

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            // Jika gambar tidak ada, atur nama gambar ke null atau nilai default
            $imageName = null;
        }


        // Menyimpan data ke database
        Artikel::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $imageName,
            'id_categories' => $request->id_categories, // Sesuaikan nama field dengan nama input di form
        ]);
        

        return back()->with('success', 'Form submitted successfully!');
    }

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
}

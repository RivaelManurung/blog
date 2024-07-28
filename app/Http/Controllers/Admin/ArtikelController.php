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
        // Validate the form data
        $request->validate([
            'judul' => 'required|string|max:255',
            'number' => 'required|integer',
            'tanggal_dibuat' => 'required|date',
            'tanggal_diperbarui' => 'required|date',
            'deskripsi' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        // Store the form data to the database
        Artikel::create([
            'judul' => $request->judul,
            'number' => $request->number,
            'tanggal_dibuat' => $request->tanggal_dibuat,
            'tanggal_diperbarui' => $request->tanggal_diperbarui,
            'deskripsi' => $request->deskripsi,
            'image' => $imageName,
        ]);

        return back()->with('success', 'Form submitted successfully!');
    }

    public function index()
    {
        $artikel = Artikel::all();
        $categories = Categori::all();
        return view('BE.pages.artikel.index', compact('artikel' ,'categories'));
    }

    public function create()
    {
        return view('BE.pages.artikel.create');
    }
}

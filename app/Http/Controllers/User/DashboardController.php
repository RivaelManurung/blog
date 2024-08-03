<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel; // Import the Artikel model
use App\Models\Categori; // Import the Categori model

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the most recent 6 articles
        $artikels = Artikel::with('categori')->orderBy('updated_at', 'desc')->take(6)->get();
        // Fetch all categories
        $categories = Categori::all();
        $recentPosts = Artikel::orderBy('updated_at', 'desc')->take(5)->get();

        // Return the view with the articles, categories, and recent posts
        return view('FE.pages.dashboard', compact('artikels', 'categories', 'recentPosts'));
    }

    public function show($id)
    {
        $categories = Categori::all();
        $artikel = Artikel::findOrFail($id);
        $recentPosts = Artikel::orderBy('updated_at', 'desc')->take(5)->get();

        return view('FE.pages.post-details', compact('artikel', 'categories','recentPosts'));
    }

    public function showall()
    {
        // Fetch all articles
        $artikels = Artikel::with('categori')->orderBy('updated_at', 'desc')->get();
        // Fetch all categories
        $categories = Categori::all();
        $recentPosts = Artikel::orderBy('updated_at', 'desc')->take(5)->get();
        dd($artikels); // Debugging, ini akan menghentikan eksekusi dan menampilkan data artikel

        return view('FE.pages.blogs', compact('artikels', 'categories', 'recentPosts'));
    }

    public function about(){
        return view('FE.pages.about');
    }
}


<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel; // Import the Artikel model
use App\Models\Categori; // Import the Category model

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the most recent 6 articles
        $artikels = Artikel::with('categori')->orderBy('updated_at', 'desc')->take(6)->get();

        // Fetch all categories
        $categories = Categori::all();

        // Fetch recent posts
        $recentPosts = Artikel::orderBy('updated_at', 'desc')->take(5)->get();

        // Fetch tags (assuming you have a Tag model and relationship)

        // Return the view with the articles, categories, recent posts, and tags
        return view('FE.pages.dashboard', compact('artikels', 'categories', 'recentPosts'));
    }
    
}

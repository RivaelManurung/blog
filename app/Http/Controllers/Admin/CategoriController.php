<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categori;

class CategoriController extends Controller
{
    public function index()
    {
        $data = Categori::orderBy('id', 'desc')->get();
        return view('BE.pages.categori.index');
    }

    public function create()
    {
        return view('BE.pages.categori.create');
    }

    public function store(request $request){
        $request->validate([
            'name' => 'required',
        ]);

        Categori::create([
            'name' => $request->name,
        ]);

        return back()->with('Success' , 'Categori created successfully');

    }
}

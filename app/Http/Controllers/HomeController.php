<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Competition;

class HomeController extends Controller
{
    public function index()
    {
        
        $competitions = Competition::with(['category', 'prizes'])
            ->where('is_public', true)
            ->where('deadline', '>=', now())
            ->orderBy('deadline', 'asc')
            ->get();

        $categories = Category::pluck('name');

        return view('home', compact(
            'competitions',
            'categories'
        ));
    }
}
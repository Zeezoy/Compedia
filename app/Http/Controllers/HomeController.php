<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Competition;

class HomeController extends Controller
{
    public function index()
    {
        $competitions = Competition::latest()
            ->take(3)
            ->get();

        $categories = Category::pluck('name');

        return view('home', compact(
            'competitions',
            'categories'
        ));
    }
}
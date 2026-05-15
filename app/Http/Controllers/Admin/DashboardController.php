<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $competitions = include resource_path(
            'data/competitions.php'
        );

        return view(
            'admin.dashboard',
            compact('competitions')
        );
    }
}
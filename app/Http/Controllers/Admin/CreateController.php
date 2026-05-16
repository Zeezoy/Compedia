<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function index()
    {
        $competitions = include resource_path(
            'data/competitions.php'
        );

        return view(
            'admin.competitions.create',
            compact('competitions')
        );
    }
}
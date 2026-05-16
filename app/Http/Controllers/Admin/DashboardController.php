<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    public function index() {
        $competitions = array_slice(
            require resource_path('data/competitions.php'),
            0,
            3
        );

        return view(
            'admin.dashboard',
            compact('competitions')
        );
    }
}
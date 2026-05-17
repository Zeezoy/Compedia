<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\User;
use App\Models\CompetitionStage;

class DashboardController extends Controller {
    public function index() {
        $totalUsers = User::count();
        
        $totalCompetitions = Competition::count();

        $openCompetitions =
            Competition::where(
                'deadline',
                '>=',
                now()
            )->count();
        
        $recentCompetitions =
            Competition::with('category')
                ->latest()
                ->take(3)
                ->get();   
        
        $monthlyCompetitions =
            Competition::whereHas('stages')
                ->join('competition_stages', 'competitions.id', '=', 'competition_stages.competition_id')
                ->selectRaw('MONTH(competition_stages.start_date) as month, COUNT(DISTINCT competitions.id) as total')
                ->whereYear('competition_stages.start_date', now()->year)
                ->groupBy('month')
                ->orderBy('month')
                ->get();
        
        $labels = [];
        $data = [];

        foreach ($monthlyCompetitions as $item) {

            $labels[] = date(
                'M',
                mktime(0, 0, 0, $item->month, 1)
            );

            $data[] = $item->total;
        }
        
        $competitions = array_slice(
            require resource_path('data/competitions.php'),
            0,
            3
        );

        return view(
            'admin.dashboard',
            compact('competitions', 'totalCompetitions', 'openCompetitions', 'recentCompetitions', 'monthlyCompetitions', 'labels', 'data', 'totalUsers')
        );
    }
}
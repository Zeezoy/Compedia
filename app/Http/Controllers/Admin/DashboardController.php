<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\User;
use App\Models\CompetitionStage;

class DashboardController extends Controller {
    public function index()
    {
        $totalUsers = User::count();
        $totalCompetitions = Competition::count();

        $openCompetitions = Competition::whereHas('stages', function ($q) {
            $q->whereRaw('start_date = (
                SELECT MIN(start_date)
                FROM competition_stages
                WHERE competition_stages.competition_id = competitions.id
            )')
            ->where('start_date', '<=', now());
        })
        ->where('deadline', '>=', now())
        ->count();

        $recentCompetitions = Competition::with([
            'category',
            'stages'
        ])
        ->latest()
        ->take(3)
        ->get();

        $monthlyCompetitions = Competition::join(
                'competition_stages',
                function ($join) {
                    $join->on(
                        'competitions.id',
                        '=',
                        'competition_stages.competition_id'
                    )
                    ->whereRaw('competition_stages.start_date = (
                        SELECT MIN(start_date)
                        FROM competition_stages cs
                        WHERE cs.competition_id = competitions.id
                    )');
                }
            )
            ->selectRaw('
                MONTH(competition_stages.start_date) as month,
                COUNT(DISTINCT competitions.id) as total
            ')
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

        return view(
            'admin.dashboard',
            compact(
                'totalUsers',
                'totalCompetitions',
                'openCompetitions',
                'recentCompetitions',
                'monthlyCompetitions',
                'labels',
                'data'
            )
        );
    }
}
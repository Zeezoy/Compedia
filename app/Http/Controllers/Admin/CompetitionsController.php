<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class CompetitionsController extends Controller {
    public function index(Request $request) {
        $competitions = collect(
            require resource_path('data/competitions.php')
        );

        if ($request->category && $request->category !== 'All') {
            $competitions =
                $competitions->filter(function ($competition) use ($request) {
                    return $competition['category'] === $request->category;
                });
        }

        if ($request->status && $request->status !== 'All') {
            $competitions =
                $competitions->filter(function ($competition) use ($request) {
                    $isClosed = now()->gt($competition['deadline']);
                    $status = $isClosed ? 'Closed' : 'Active';
                    return $status === $request->status;
                });
        }

        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        
        $currentItems =
            $competitions->slice(
                ($currentPage - 1) * $perPage,
                $perPage
            )->values();
        
        $paginatedCompetitions =
            new LengthAwarePaginator(
                $currentItems,
                $competitions->count(),
                $perPage,
                $currentPage,
                [
                    'path' => request()->url(),
                    'query' => request()->query(),
                ]
            );

        $categories =
            collect(
                require resource_path('data/competitions.php')
            )
            ->pluck('category')
            ->unique()
            ->values();

        return view(
            'admin.competitions.competitions',
            [
                'competitions' => $paginatedCompetitions,
                'categories' => $categories,
            ]
        );
    }

    public function edit($id) {
        $competitions =
            require resource_path('data/competitions.php');

        $competition =
            collect($competitions)
                ->firstWhere('id', (int) $id);

        return view(
            'admin.competitions.edit',
            compact('competition')
        );
    }
}
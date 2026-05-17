<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Competition;

class CompetitionsController extends Controller {
    public function index(Request $request) {
        $competitions = collect(
            require resource_path('data/competitions.php')
        );

        if ($request->categories) {
            $competitions = $competitions->filter(function ($competition) use ($request) {
                return in_array($competition['category'], $request->categories);
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

public function publicIndex(Request $request) {
    $competitions = Competition::with('category')
        ->where('status', 'aktif')
        ->orderBy('deadline', 'asc')
        ->get();

    if ($request->search) {
        $search = strtolower($request->search);

        $competitions = $competitions->filter(function ($competition) use ($search) {
            return str_contains(strtolower($competition->title), $search)
                || str_contains(strtolower($competition->organizer ?? ''), $search)
                || str_contains(strtolower($competition->category->name ?? ''), $search);
        });
    }

    if ($request->categories) {
        $competitions = $competitions->filter(function ($competition) use ($request) {
            return in_array($competition->category->name ?? '', $request->categories);
        });
    }

    if ($request->prize) {
        $competitions = $competitions->filter(function ($competition) use ($request) {
            $prizeNumber = (int) preg_replace('/[^0-9]/', '', $competition->prize ?? '0');
            return $prizeNumber >= (int) $request->prize;
        });
    }

    $competitions = $competitions->sortBy('deadline')->values();

$perPage = 4;
$currentPage = LengthAwarePaginator::resolveCurrentPage();

$currentItems = $competitions
    ->slice(($currentPage - 1) * $perPage, $perPage)
    ->values();

$competitions = new LengthAwarePaginator(
    $currentItems,
    $competitions->count(),
    $perPage,
    $currentPage,
    [
        'path' => request()->url(),
        'query' => request()->query(),
    ]
);

    $categories = \App\Models\Category::pluck('name')->values();

    return view('user.competitions.index', [
        'competitions' => $competitions,
        'categories' => $categories,
    ]);
}

public function show($id) {
    $competition = Competition::with('category')->findOrFail($id);

    return view('user.competitions.show', compact('competition'));
}
}
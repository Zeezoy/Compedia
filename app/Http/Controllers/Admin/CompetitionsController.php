<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\Category;
use App\Models\CompetitionRule;
use App\Models\CompetitionStage;
use App\Models\CompetitionPrize;

class CompetitionsController extends Controller {
    public function index(Request $request)
    {
        $query = Competition::with('category');
        
        if ($request->category && $request->category !== 'All') {
            $query->where('category_id', $request->category);
        }

        if ($request->status && $request->status !== 'All') {
            if ($request->status === 'Closed') {
                $query->where('deadline', '<', now());;
            }

            if ($request->status === 'Active') {
                $query->whereHas('stages', function ($q) {
                    $q->whereRaw('start_date = (
                        SELECT MIN(start_date)
                        FROM competition_stages
                        WHERE competition_stages.competition_id = competitions.id
                    )')
                    ->where('start_date', '<=', now());
                })
                ->where('deadline', '>=', now());
            }

            if ($request->status === 'Upcoming') {
                $query->whereHas('stages', function ($q) {
                    $q->whereRaw('start_date = (
                        SELECT MIN(start_date)
                        FROM competition_stages
                        WHERE competition_stages.competition_id = competitions.id
                    )')
                    ->where('start_date', '>', now());
                });
            }
        }

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $competitions = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Category::all();

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

        $totalCompetitions = Competition::count();

        $upcomingCompetitions = Competition::whereHas('stages', function ($q) {
            $q->where('start_date', '>', now());
        })->count();

        return view('admin.competitions.competitions', compact(
            'competitions',
            'categories',
            'openCompetitions',
            'totalCompetitions',
            'upcomingCompetitions'
        ));
    }

    public function create() {
        $categories = Category::all();

        $competition = new Competition();
        $competition->photo_url = null;

        $competition->setRelation('stages', collect());
        $competition->setRelation('rules', collect());
        $competition->setRelation('prizes', collect());

        return view('admin.competitions.create', compact('categories', 'competition'));
    }

    public function edit($id) {
        $competition = Competition::with([
            'rules',
            'stages',
            'prizes',
            'category'
        ])->findOrFail($id);

        $categories = Category::all();

        return view('admin.competitions.edit', compact('competition', 'categories'));
    }

    public function store(Request $request) {
        $photoPath = null;

        if ($request->hasFile('photo_url')) {
            $photoPath = $request->file('photo_url')->store('competitions', 'public');
        }

        $competition = Competition::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'organizer' => $request->organizer,
            'deadline' => null,
            'registration_link' => $request->registration_link,
            'guidebook_link' => $request->guidebook_link,
            'registration_fee' => $request->registration_fee,
            'is_public' => $request->is_public ?? false,
            'photo_url' => $photoPath,
        ]);

        foreach ($request->rules ?? [] as $rule) {
            if (!$rule) continue;
            CompetitionRule::create([
                'competition_id' => $competition->id,
                'rule' => $rule,
            ]);
        }

        foreach ($request->stage_title ?? [] as $index => $title) {
            if (!$title) continue;
            CompetitionStage::create([
                'competition_id' => $competition->id,
                'title' => $title,
                'start_date' => $request->stage_start[$index],
                'end_date' => $request->stage_end[$index],
            ]);
        }

        foreach ($request->prize_title ?? [] as $index => $title) {
            if (!$title) continue;
            CompetitionPrize::create([
                'competition_id' => $competition->id,
                'title' => $title,
                'amount' => $request->prize_amount[$index],
            ]);
        }

        $lastStage = CompetitionStage::where('competition_id', $competition->id)
            ->orderBy('end_date', 'desc')
            ->first();

        if ($lastStage) {
            $competition->update([
                'deadline' => $lastStage->end_date
            ]);
        }
        
        return redirect(
            '/admin/competitions'
        );
    }

    public function update(Request $request, $id) {
        $competition = Competition::findOrFail($id);
        $photoPath = $competition->photo_url;

        if ($request->hasFile('photo_url')) {
            $photoPath = $request->file('photo_url')->store('competitions', 'public');
        }

        $competition->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'organizer' => $request->organizer,
            'registration_link' => $request->registration_link,
            'guidebook_link' => $request->guidebook_link,
            'registration_fee' => $request->registration_fee,
            'is_public' => $request->is_public ?? false,
            'photo_url' => $photoPath,
        ]);

        CompetitionRule::where('competition_id', $competition->id)->delete();

        foreach ($request->rules ?? [] as $rule) {
            if (!$rule) continue;

            CompetitionRule::create([
                'competition_id' => $competition->id,
                'rule' => $rule,
            ]);
        }

        CompetitionStage::where('competition_id', $competition->id)->delete();

        foreach ($request->stage_title ?? [] as $index => $title) {
            if (!$title) continue;

            CompetitionStage::create([
                'competition_id' => $competition->id,
                'title' => $title,
                'start_date' => $request->stage_start[$index] ?? null,
                'end_date' => $request->stage_end[$index] ?? null,
            ]);
        }

        CompetitionPrize::where('competition_id', $competition->id)->delete();

        foreach ($request->prize_title ?? [] as $index => $title) {
            if (!$title) continue;

            CompetitionPrize::create([
                'competition_id' => $competition->id,
                'title' => $title,
                'amount' => $request->prize_amount[$index] ?? 0,
            ]);
        }

        $lastStage = CompetitionStage::where('competition_id', $competition->id)
            ->orderBy('end_date', 'desc')
            ->first();

        if ($lastStage?->end_date) {
            $competition->update([
                'deadline' => $lastStage->end_date
            ]);
        }

        return redirect('/admin/competitions');
    }

    public function destroy($id) {
        $competition = Competition::findOrFail($id);

        CompetitionRule::where('competition_id', $competition->id)->delete();
        CompetitionStage::where('competition_id', $competition->id)->delete();
        CompetitionPrize::where('competition_id', $competition->id)->delete();

        if ($competition->photo_url) {
            \Storage::disk('public')->delete($competition->photo_url);
        }

        $competition->delete();

        return redirect('/admin/competitions');
    }
}
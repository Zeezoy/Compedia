@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-11">
     <x-stat-card
        title="Total Users"
        :value="$totalUsers"
        growth="+8.5% from last month"
    >
        <x-bx-user-plus class="w-10 h-10"/>
    </x-stat-card>
    <x-stat-card
        title="Total Competitions"
        :value="$totalCompetitions"
        growth="+8.5% from last month"
    >
        <x-bx-bullseye class="w-10 h-10"/>
    </x-stat-card>
</div>

<div class="w-full overflow-x-auto">
    <x-chart
        title="Competition Trend"
        description="Total Competitions / month"
        chartId="competitionTrendChart"
        type="bar"
        datasetLabel="Competitions"
        :labels="$labels"
        :data="$data"
    />
</div>

<div class="overflow-x-auto">
    <x-table title="Review Competitions" action="View All">
        <thead>
            <tr class="text-left text-sm text-[#D9D9D9] border-b border-white/10">
                <th class="pb-3">Title</th>
                <th class="pb-3">Category</th>
                <th class="pb-3">Deadline</th>
                <th class="pb-3">Status</th>
                <th class="pb-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recentCompetitions as $competition)
            <tr class="border-b border-white/10">
                <td class="py-4">
                    {{ $competition->title }}
                </td>
                <td class="py-4">
                    <x-badge>{{ $competition->category->name }}</x-badge>
                </td>
                <td class="py-4">
                    {{ $competition->formatted_deadline }}
                </td>
                <td class="py-4">
                    @php $status = $competition->status; @endphp

                    <span class="
                        px-3 py-1 rounded-full text-xs font-medium
                        {{ $status === 'Active' ? 'text-[#C0FFC6]' : '' }}
                        {{ $status === 'Upcoming' ? 'text-[#D3E5FF]' : '' }}
                        {{ $status === 'Closed' ? 'text-[#FFA5A7]' : '' }}
                    ">
                        {{ $status }}
                    </span>
                </td>
                <td class="py-4 flex items-center">
                    <a href="" class="text-[#DEB8FF]">
                        <x-bx-pencil class="w-6 h-6"/>
                    </a>
                    <a href="" class="ml-4 text-[#DEB8FF]">
                        <x-bx-trash class="w-6 h-6"/>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-table>
</div>

@endsection
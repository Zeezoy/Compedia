@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')

<div class="flex gap-11">
     <x-stat-card
        title="Total Users"
        value="12"
        growth="+8.5% from last month"
    >
        <x-bx-user-plus class="w-10 h-10"/>
    </x-stat-card>
    <x-stat-card
        title="Total Competitions"
        value="12"
        growth="+8.5% from last month"
    >
        <x-bx-bullseye class="w-10 h-10"/>
    </x-stat-card>
</div>

<div>
    <x-chart
        title="Competition Trend"
        description="Total Competitions / month"
        chartId="competitionTrendChart"
        type="bar"
        datasetLabel="Competitions"
        :labels="['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']"
        :data="[10, 20, 15, 25, 30, 40]"
    />
</div>

<div>
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
            @foreach ($competitions as $competition)
            <tr class="border-b border-white/10">
                <td class="py-4">
                    {{ $competition['title'] }}
                </td>
                <td class="py-4">
                    <x-badge>{{ $competition['category'] }}</x-badge>
                </td>
                <td class="py-4">
                    {{ $competition['deadline'] }}
                </td>
                <td class="py-4">
                    @if($competition['status'] === 'Active')
                        <span class="text-[#C0FFC6]">Active</span>
                    @elseif($competition['status'] === 'Up Coming')
                        <span class="text-[#D3E5FF]">Up CComing</span>
                    @else
                        <span class="text-[#FFA5A7]">Closed</span>
                    @endif
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